<?php include("top.html"); ?>
    <div>
        <form action="signup-submit.php" method="post">
            <fieldset>
                <legend>
                    New User Signup:
                </legend>
                <p><strong>Name:</strong> <input type="text" maxlength="16" name="name"/></p>
                <p><strong>Password:</strong> <input type="password" name="password"/></p>

                <p>
                        <strong> Gender:</strong>
                        <label><input type="radio" name="gender" value="M"/>Male</label>


                    <label><input type="radio" name="gender" value="F" checked/>Female</label>
                    </p>

                <p><strong>Age:</strong> <input type="text" maxlength="2" size="6" name="age"/></p>

                <p><strong>Personality type:</strong> <input type="text" name="personalitytype" size="6"
                                                                    maxlength="4"/>
                        (<a href="http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a> )</p>
                <p><strong>Favourite OS:</strong> <select name="favos">
                    <option value="Windows" selected>Windows</option>
                    <option value="Mac OS X">Mac</option>
                    <option value="Linux">Linux</option>
                </select>
                </p>
                <p><strong>Seeking age:</strong> <input type="text" name="minage" maxlength="2" placeholder="min"
                                                            size="6"/>
                    to<input type="text" name="maxage" maxlength="2" placeholder="max" size="6"/>
                </p>
                <p><input type="submit" value="Sign Up"/></p>
            </fieldset>
        </form>
    </div>

<?php include("bottom.html"); ?>