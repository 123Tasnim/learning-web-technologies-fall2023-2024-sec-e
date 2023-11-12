<?php
    session_start();

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{header("location:login.php");}
    
    if(isset($_POST['logout'])){
        session_destroy();
        header("location:login.php");
    }

    $conn = new mysqli("localhost","root","","complaint");
   
    $category=$subcat=$complaintype=$state=$noc=$complaintdetials=$edit='';
    $empmsg_noc=$empmsg_complaint_details='';

    if(isset($_POST['delete'])){
        $id = $_POST['delete'];
        $sql_Del="Delete from cmplist where comno='$id'";
        mysqli_query($conn,$sql_Del);
    }

    else if(isset($_POST['edit'])){
        $edit = $_SESSION['edit'] = $_POST['edit'];
        $sqlEdit = "select * from cmplist where comno='$edit'";
        $e_res = mysqli_fetch_assoc(mysqli_query($conn,$sqlEdit));

        $category=$e_res['category'];
        $subcat=$e_res['subcat'];
        $complaintype=$e_res['complaintype'];
        $state=$e_res['state'];
        $noc=$e_res['noc'];
        $complaintdetials=$e_res['complaintdetials'];
    }

    else if(isset($_POST['update'])){
        $edit = $_SESSION['edit'];
        $category=$_POST['category'];
        $subcat=$_POST['subcategory'];
        $complaintype=$_POST['complaint_type'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaint_details'];

        $err = 0;

        if(empty ($noc)) {
            $empmsg_noc = 'Fill up this field.'; $err+=1;
        }

        if(empty ($complaintdetials)) {
            $empmsg_complaint_details = 'Fill up this field.'; $err+=1;
        }
        
        if ($err == 0){            
            $sqlUpdate = "UPDATE `cmplist` SET `category`='$category',`subcat`='$subcat',`complaintype`='$complaintype',`state`='$state',`noc`='$noc',`complaintdetials`='$complaintdetials' WHERE comno='$edit'";
            mysqli_query ($conn,$sqlUpdate);
            $_SESSION['edit'] = '';
            header("location:complaint_history.php");
        } 

    }


    $sql = "select * from cmplist where user='$user' order by date desc";
    $res = mysqli_query($conn,$sql);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Complaint History</title>
</head>

<body>

    <form method = "post">
        <h3>Welcome <?php echo $user?></h3>
        <input type="button" onclick="location.href='register_complaint.php';" value ='New Complaint' />
        <input type="button" onclick="location.href='notification.php';" value ='Notifications' />
        <button name = 'logout'>LogOut</button>
    </form>

    <br><br>

    <form method = 'post'>
        <table border ="1">
            <tr>
                <th>Complaint Number </th>
                <th>Reg Date </th>
                <th> Status</th>
                <th colspan="2"> Action </th>
            </tr>
            <?php   while($r= mysqli_fetch_assoc($res)){ 
                        echo "<tr>";
                        echo "<td>$r[comno]</td>";
                        echo "<td>$r[date]</td>";
                        echo "<td>$r[status]</td>";
                        if($r['status'] == 'Sent'){                         
                            echo "<td><button type='submit' name='edit' value='$r[comno]'>Edit</button></td>";
                            echo "<td><button type='submit' name='delete' value='$r[comno]'>Delete</button></td>";
                        }
                        echo "</tr>";
                    } ?>
      </table>
    </form>
                
    <fieldset style="width:40%;right:30px;top:30px; position:fixed">
        <form  method="post" enctype="multipart/form-data">
            
            <label for="category">Category:</label>        
                <select name="category" id="category" >
                    <option value=<?php echo $category ?>><?php echo $category ?></option>
                    <option value="Category 1" >Category 1</option>
                    <option value="Category 2">Category 2</option>   
                </select>
            <span>  <?php //echo $empmsg_category;  ?> </span>
            <br>

            <label for="subcategory">Subcategory:</label>
                <select name="subcategory" id="subcategory">
                    <option value=<?php echo $subcat ?>><?php echo $subcat ?></option>
                    <option value="Subcategory1">Subcategory1</option>
                    <option value="Subcategory2">Subcategory2</option>
                </select>
            <span>  <?php //echo $empmsg_subcategory;  ?> </span>
            <br>

            <label for="complaint_type">Complaint Type:</label>
                <select name="complaint_type" >
                    <option value=<?php echo $complaintype ?>><?php echo $complaintype ?></option>
                    <option value="Complaint">Complaint</option>
                    <option value="General Query">General Query</option>
                </select>
            <span>  <?php //echo $empmsg_complaint_type;  ?> </span>
            <br>

            <label for="state">State:</label>
                <select name="state">
                    <option value=<?php echo  $state ?>><?php echo  $state ?></option>
                    <option value="State 1">State 1</option>
                    <option value="State 2">State 2</option>
                </select>
            <span>  <?php //echo $empmsg_state;  ?> </span>
            <br>

            <label for="nature_of_complaint">Nature of Complaint:</label>
                <input type="text" name="noc" value=<?php echo  $noc ?>>
            <span>  <?php echo $empmsg_noc;  ?> </span>
            <br>

            <label for="complaint_details">Complaint Details :</label><br> 
                <textarea name="complaint_details" cols="50" rows="10"><?php echo  $complaintdetials ?></textarea>
            <span>  <?php echo $empmsg_complaint_details;  ?> </span>
            <br>

            <button type="submit" name="update">Update</button>
            <span>  <?php //echo $success;  ?> </span>
        </form>
    </fieldset>

</body>
</html>

