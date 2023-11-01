<table border="1">
        
        <?php include_once ('header.php'); ?>
        
        <tr>
            <td><form method="POST" action="">
                <fieldset>
                    <legend>Log in</legend>
                    
                    User name:<input type="text" name="userName" id="" value=""><br>
                    Password:<input type="password" name="password" id="" value="">
                    <hr>
                    <input type="checkbox" name="remember_me" id="checkbox">
                        <label for="checkbox"> Remember Me</label><br>
                        <input type="submit" name="submit" value="Submit" />
                        <a href="forgetPassword.php">Forgot Password?</a>
                </fieldset>
                </form>
                <br>
                </td>
        </tr>
        
        <?php include_once ('footer.php'); ?>
        
    </table>