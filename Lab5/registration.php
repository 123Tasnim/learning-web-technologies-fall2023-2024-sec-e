
    <table border="1">
        
            <?php include_once ('header.php'); ?>
        
        <tr>
            <td>
<form method="POST" action="">
                <fieldset>
                    <legend>Registration</legend>
                    Name:<input type="text" name="name" id="" value="">
                    <hr>
                    Email:<input type="email" name="email" id="" value="">
                    <hr>
                    User name:<input type="text" name="userName" id="" value="">
                    <hr>
                    Password:<input type="password" name="password" id="" value="">
                    <hr>
                    Confirm Password:<input type="password" name="confirmPassword" id="" value="">
                    <hr>
                    <fieldset>
                        <legend>Gender</legend>
                        <input type="radio" name="gender" value="male">Male
                        <input type="radio" name="gender" value="female">Female
                        <input type="radio" name="gender" value="other">Other
                    </fieldset>
                    <hr>
                    <fieldset>
                        <legend>Date of Birth</legend>
                        <input type="text" name="day" value="">
                        <input type="text" name="month" value="">
                        <input type="text" name="year" value="">(dd/mm/year)
                    </fieldset>
                    <hr>
                    <input type="submit" name="submit" id="" value="submit">
                    <input type="reset" name="submit" id="" value="reset">
                </fieldset>
            </form></td>
        </tr>
        
            <?php include_once ('footer.php'); ?>
        
    </table>

