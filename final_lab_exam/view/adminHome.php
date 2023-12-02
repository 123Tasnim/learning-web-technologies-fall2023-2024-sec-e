<?php

    //session_start();
    include_once("../model/userModel.php");
    $info = getAllUser();

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Home Page</title>
        <script src="../JS/search.js"></script>
    </head>
    <body>
        <h1><center>Welcome Admin Home Page</center></h1>
        <hr>
        <a href="empReg.php">
            <center><button type="button" style="font-size: 20px; cursor:pointer;">Employees Registration</button></center>
        </a>
        <br><br><br><br>
        <h2>Emplyee Table</h2>
        <table border="1" cellspacing="0" style="font-size: 15px; text-align:center;">
            <tr>
                <td>Employee Name</td>
                <td>Contact No</td>
                <td>User Name</td>
                <td>Password</td>
                <td>User Type</td>
                <td>Option</td>
            </tr>
            <?php for($i=0; $i<count($info); $i++){ ?>
                <tr>
                    <td><?=$info[$i]['employee_name']?></td>
                    <td><?=$info[$i]['contact_no']?></td>
                    <td><?=$info[$i]['username']?></td>
                    <td><?=$info[$i]['password']?></td>
                    <td><?=$info[$i]['usertype']?></td>
                    <td>
                        <a href='update.php?id=<?=$info[$i]['id']?>'>UPDATE</a> |
                        <a href='../controller/delete.php?id=<?=$info[$i]['id']?>'>DELETE</a> 
                    </td>
                </tr>   
            <?php } ?>
        </table>
        <br><br><br><br>
        <hr>
        <h2><b>Employer Search</b></h2>
       
        <label style="font-size: 20px; text-align:left;">Search by username: </label>
        <input type="text" id="srch_username" name="" value="">
        <input type="button" name="click" value="Search" onclick="searchValidation()" style="font-size: 14px;">
        <label type="" id="searchuname_err" style="color: red; font-size:18px;"></label>
        <br><br>
        
        <table border="1" cellspacing="0" style="font-size: 18px; text-align:center;" id="">
            <tr>
                <td>Employer Name</td>
                <td>Contact No</td>
                <td>User Name</td>
                <td>Password</td>
            </tr>
            <tr>
                <td id="s_en">&nbsp</td>
                <td id="s_cn">&nbsp</td>
                <td id="s_un">&nbsp</td>
                <td id="s_p">&nbsp</td>
            </tr> 
        </table>
        <br><br>
        <a href="../controller/logout.php">
            <button type="button" style="font-size: 16px; cursor:pointer;">Log Out</button>
        </a> 
    </body>
</html>
