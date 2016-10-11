<?php
session_start();
$name = $_SESSION['username'];
$index = 0;
if ($_GET)
    $index = (int)$_GET['index'];
if (!$name) {
    $_SESSION['error'] = "Please login first.";
    header("Location: login.php");
    exit;
}
$mymatch = $_SESSION['matches'];
include "top.html";
?>
    <strong>Matches for <?= $name; ?><a href="logout.php">Log Out</a></strong>
<?php
if ($index >= 0 && $index < count($mymatch)) {
    list($id, $matchname, $password, $gender, $age, $type1, $type2, $type3, $type4, $os) = $mymatch[$index];
    ?>
    <div class="match">
        <p><img src="images/user.jpg" alt="User Image"/> <?= $matchname; ?></p>
        <ul>
            <li><strong>gender</strong><?= $gender; ?></br></li>
            <li><strong>age</strong><?= $age; ?></br></li>
            <li><strong>type</strong><?= $type1 . $type2 . $type3 . $type4; ?></br></li>
            <li><strong>os</strong><?= $os; ?></li>
        </ul>
    </div>
    <div class="prev">
        <?php if ($index > 0) { ?>
            <a href="view-match.php?index=<?= $index - 1; ?>">Previous Match</a>
        <?php } else {
            ?>Previous Match<?php
        }
        ?>
    </div>
    <div class="next">
        <?php
        if ($index < (count($mymatch) - 1)) { ?>
            <a href="view-match.php?index=<?= $index + 1; ?>">Next Match</a>
            <?php
        } else { ?>
            Next Match
            <?php
        } ?>

    </div>
    <?php
}
?>
<?php
include "bottom.html";