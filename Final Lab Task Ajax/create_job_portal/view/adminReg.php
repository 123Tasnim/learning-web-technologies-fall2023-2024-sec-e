<?php
    include_once('home.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Admin Registration</title>
        <script src="../JS/adminRegCheck.js"></script>
    </head>
    <body>
        <fieldset>
            <legend style="font-size: 20px; text-align:left;"><b>Admin Registration</b></legend>
            <table style="font-size: 20px;">
                <tr>
                    <td>Name :</td>
                    <td><input type="text" name="" id="admin_name" value=""></td>
                </tr>
                <tr>
                    <td>Contact No :</td>
                    <td><input type="text" name="" id="cont_no" value=""></td>
                </tr>
                <tr>
                    <td>User Name :</td>
                    <td><input type="text" name="" id="uname" value=""></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td><input type="password" name="" id="admin_pass" value=""></td>
                </tr>
                <tr>
                    <td></td>
                    <td>
                        <br>
                        <input type="submit" name="submit" style="font-size: 20px; cursor:pointer;" onclick="adminRegValidation()" value="Registration">
                        &nbsp&nbsp&nbsp&nbsp
                        <a href="home.php"><button type="button" style="font-size: 20px; cursor:pointer;">Back</button></a>
                    </td>
                </tr>
            </table>
        </fieldset>
    </body>
</html>
