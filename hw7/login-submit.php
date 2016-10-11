<?php
session_start();
$username = $_POST["name"];
$password = $_POST["password"];
include_once("db_connection.php");
$query = "SELECT * FROM singles WHERE name = :name";
$stmt = $db->prepare($query);
$bind = array(':name' => $username);
$stmt->execute($bind);
$row = $stmt->fetch();
if ($row != null && password_verify($password, $row["pass"])) {
    $_SESSION['username'] = $username;

    $stmt = $db->prepare("SELECT * FROM singles WHERE gender <> :gender AND age >= :min AND age <= :max AND os = :os AND (type1 = :type1 OR type2 = :type2 OR type3 = :type3 OR type4 = :type4)");
    $bind = array(':gender' => $row["gender"], ':min' => $row["min"], ':max' => $row["max"],
        ':os' => $row["os"], ':type1' => $row["type1"], ':type2' => $row["type2"],
        ':type3' => $row["type3"], ':type4' => $row["type4"]
    );
    $stmt->execute($bind);
    $matcharray = array();
    foreach ($stmt as $row) {
        $matcharray[] = $row;
    }
    $_SESSION['matches'] = $matcharray;
    header("Location: view-match.php");
    exit;
}
$_SESSION['error'] = "Invalid username or password";
header("Location: login.php");
exit;