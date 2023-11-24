<?php

    include_once('home.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Log In</title>
    </head>
    <body>
        <form action="../controller/loginCheck.php" method="POST">
            <fieldset>
                <legend style="font-size: 20px; text-align:left;"><b>Log In</b></legend>
                <table style="font-family: Verdana; font-size: 20px; ">
                    <tr>
                        <td>User Name :</td>
                        <td><input type="text" name="user_name" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["username_err"]) ?  $_SESSION["username_err"] : '' ;?></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="pass" value="" /></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["pass_err"]) ?  $_SESSION["pass_err"] : '' ;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td style="font-size: 15px; color: red;"><?php echo isset($_SESSION["unotexist"]) ? $_SESSION["unotexist"] : '' ;?></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input type="submit" name="login" style="font-size: 20px; cursor:pointer;" value="Log In">
                            &nbsp&nbsp&nbsp&nbsp&nbsp
                            <a href="home.php"><button type="button" style="font-size: 20px;">Back</button></a>
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
        <?php
            unset($_SESSION["username_err"]);
            unset($_SESSION["pass_err"]); 
            unset($_SESSION["unotexist"]);  
        ?>
    </body>
</html>
