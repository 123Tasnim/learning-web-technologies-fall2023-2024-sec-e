<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="../JS/login.js"></script>
        <title>Log In</title>
    </head>
    <body>
        <form action="../controller/loginCheck.php" method="POST" onsubmit="return loginValidation();">
            <fieldset>
                <legend style="font-size: 30px; text-align:center;"><b>Log In</b></legend>
                <table style="font-family: Verdana; font-size: 30px; ">
                    <tr>
                        <td>User Name :</td>
                        <td><input type="text" name="user_name" id="user_name" value=""></td>
                    </tr>
                    <tr>
                        <td>Password :</td>
                        <td><input type="password" name="pass" id="pass" value=""></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                            <br>
                            <input type="submit" name="login" value="Log In" style="font-size: 20px; cursor:pointer;">
                        </td>
                    </tr>
                </table>
            </fieldset>
        </form>
    </body>
</html>
