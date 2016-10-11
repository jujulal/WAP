<?php
session_start();
include("top.html"); ?>
    <div>
        <div><?php if (isset($_SESSION["error"])) { ?>
                <strong><?= $_SESSION["error"]; ?></strong>
            <?php }
            session_destroy(); ?></div>
        <form action="login-submit.php" method="post">
            <fieldset>
                <legend>
                    Returning User:
                </legend>
                <p><strong>Name:</strong><input type="text" name="name" maxlength="16"/></p>

                <p><strong>Password:</strong> <input type="password" name="password"/></p>
                <input type="submit" value="View My Matches">
            </fieldset>
        </form>
    </div>
<?php
include "bottom.html"; ?>