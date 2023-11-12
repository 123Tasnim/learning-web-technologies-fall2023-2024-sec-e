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

    else if(isset($_POST['view'])){
        $view = $_SESSION['view'] = $_POST['view'];
        $sqlView = "select * from cmplist where comno='$view'";
        $v_res = mysqli_fetch_assoc(mysqli_query($conn,$sqlView));

        $user = $_SESSION['u'] =  $v_res['user'];
        $status = $_SESSION['s'] = $v_res['status'];
        $category=$v_res['category'];
        $subcat=$v_res['subcat'];
        $complaintype=$v_res['complaintype'];
        $state=$v_res['state'];
        $noc=$v_res['noc'];
        $complaintdetials=$v_res['complaintdetials'];
        
        if($status == 'Sent'){
            $sqlUpdate = "UPDATE `cmplist` SET `status`='Viewed' WHERE comno='$view'";
            mysqli_query ($conn,$sqlUpdate);

            $message='Your Complaint has been Viewed';
            $sql = "INSERT INTO notifications (user, message) VALUES ('$user', '$message')";//for notification when view 
            mysqli_query($conn, $sql);
        }//then create if sent then update and notification
        
    }

    else if(isset($_POST['stp'])){
        $view = $_SESSION['view'];
        $user = $_SESSION['u'];
        $status = $_SESSION['s'];

        if($status == 'Viewed'){
            $sqlUpdate = "UPDATE `cmplist` SET `status`='Cleared' WHERE comno='$view'";
            mysqli_query ($conn,$sqlUpdate);

            $message='Your Complaint has been Cleared';
            $sql = "INSERT INTO notifications (user, message) VALUES ('$user', '$message')";//for notification when view 
            mysqli_query($conn, $sql);
        }

        $_SESSION['view'] = '';
        $_SESSION['u'] = '';
        $_SESSION['s'] = '';
        header("location:complaint_details.php");
    }


    $sql = "select * from cmplist order by date desc";
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
        <button name = 'logout'>LogOut</button>
    </form>

    <br><br>

    <form method = 'post'>
        <table border ="1">
            <tr>
                <th>Complaint Number </th>
                <th>Reg Date </th>
                <th> Status</th>
                <th> Action </th>
            </tr>
            <?php   while($r= mysqli_fetch_assoc($res)){ 
                        echo "<tr>";
                        echo "<td>$r[comno]</td>";
                        echo "<td>$r[date]</td>";
                        echo "<td>$r[status]</td>";                        
                        echo "<td><button type='submit' name='view' value='$r[comno]'>View</button></td>";
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

            <button type="submit" name="stp">Send to person</button>
            <span>  <?php //echo $success;  ?> </span>
        </form>
    </fieldset>

</body>
</html>

