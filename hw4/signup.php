<?php include("top.html"); ?>
<!-- CSE 190 M, Homework 4 (NerdLuv)
     This provided file is the signup page which register new member. 
     Form is submited to signup-submit.php page -->

<div>
    <form method="post" action="signup-submit.php" autocomplete="off">
        <fieldset>
            <legend>New User Signup:</legend>
            <p>
                <strong>Name:</strong><input type="text" name="name" size="16"  />
            </p>
            <p>
                <strong>Gender:</strong>
                <input type="radio" name="gender" value="M"/>Male
                <input type="radio" name="gender" value="F" checked="checked"/>Female
            </p>
            <p>
                <strong>Age:</strong><input size="6" type="text" name="age"/>
            </p>
            <p>
                <strong>Personality</strong>
                <input type="text" name="personality" size="6"/>
                (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>)
            </p>
            <p>
                <strong>Favorite OS:</strong>
                <select name="favOS">
                    <option>Windows</option>
                    <option>Mac OS X</option>
                    <option>Linux</option>
                </select>
            </p>
            <p>
                <strong>Seeking age:</strong>
                <input type="text" placeholder="min" size="6" name="min" maxlength="2"/>
                to
                <input type="text" placeholder="max" size="6" name="max" maxlength="2"/>
            </p>
            <p>
                <input type="submit" value="Sign Up">
            </p>
        </fieldset>
    </form>

</div>

<?php include("bottom.html"); ?>