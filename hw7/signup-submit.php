<?php
$name = $_POST["name"];
$password = $_POST["password"];
$gender = $_POST["gender"];
$age = $_POST["age"];
$per_type = $_POST["personalitytype"];
$fav_os = $_POST["favos"];
$min_age = $_POST["minage"];
$max_age = $_POST["maxage"];
include_once("db_connection.php");
$query = "INSERT INTO singles VALUES (NULL, :name, :pass_hash, :gender, :age, :type1, :type2, :type3, :type4, :os, :min, :max)";
$stmt = $db->prepare($query);
$bind = array(':name' => $name, ':pass_hash' => password_hash($password, PASSWORD_DEFAULT), ':gender' => $gender,
    ':age' => $age, ':type1' => $per_type[0], ':type2' => $per_type[1], ':type3' => $per_type[2], ':type4' => $per_type[3],
    ':os' => $fav_os, ':min' => $min_age, ':max' => $max_age);
$added = $stmt->execute($bind);
if ($added) {
    session_destroy();
    session_start();
    $_SESSION['username'] = $name;

    $stmt = $db->prepare("SELECT * FROM singles WHERE gender <> :gender AND age >= :min AND age <= :max AND os = :os AND (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
    $bind = array(':gender' => $gender, ':min' => $min_age, ':max' => $max_age,
        ':os' => $fav_os, ':type1' => $per_type[0], ':type2' => $per_type[1],
        ':type3' => $per_type[2], ':type4' => $per_type[3]
    );
    $stmt->execute($bind);
    $matcharray = array();
    foreach ($stmt as $row) {
        $matcharray[] = $row;
    }
    $_SESSION['matches'] = $matcharray;
    header("Location: thank-you.php");
    exit;
}