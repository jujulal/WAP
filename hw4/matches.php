<?php include("top.html"); ?>
<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the search page that matches the enter data in the matchs-submit.php
      -->
<div>
    <form method="get" action="matches-submit.php" enctype="application/x-www-form-urlencoded" >
        <fieldset>
        <legend>Returning User:</legend>
        <p>
            <strong>Name</strong>
            <input type="text" name="name">
            <input type="submit" value="View My Matches">
        </p>
    </fieldset>
    </form>
    

</div>

<?php include("bottom.html"); ?>