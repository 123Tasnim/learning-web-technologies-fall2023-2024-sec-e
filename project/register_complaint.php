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


    $conn = new mysqli('localhost','root','','complaint');


    $empmsg_category= $empmsg_subcategory=$empmsg_complaint_type= $empmsg_state = $empmsg_noc=$empmsg_complaint_details=$empmsg_complaint_file='';
    if(isset($_POST['submit'])){

        $category=$_POST['category'];
        $subcat=$_POST['subcategory'];
        $complaintype=$_POST['complaint_type'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaint_details'];
        $compfile=$_FILES["complaint_file"];
        $compfile="";

        $err = 0;

        if(empty ($category)) {
            $empmsg_category = 'Please select a Category'; $err+=1;
        }

        if(empty ($subcat)) {
            $empmsg_subcategory = 'Fill up this field.'; $err+=1;
        }

        if(empty ($complaintype)) {
            $empmsg_complaint_type = 'Fill up this field.'; $err+=1;
        }

        if(empty ($state)) {
            $empmsg_state = 'Fill up this field.'; $err+=1;
        }

        if(empty ($noc)) {
            $empmsg_noc = 'Fill up this field.'; $err+=1;
        }

        if(empty ($complaintdetials)) {
            $empmsg_complaint_details = 'Fill up this field.'; $err+=1;
        }
        
        if ($err == 0){
            $sql1 = "insert into cmplist (category,subcat,complaintype,state,noc,complaintdetials,compfile,user) VALUES ('$category','$subcat','$complaintype','$state','$noc','$complaintdetials','$compfile','$user');";
            mysqli_query ($conn,$sql1);
            header("location:complaint_history.php");
        } 

    }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Complaint Registration</title>
    </head>
    <body>
        <form method = "post">
            <h3>Welcome <?php echo $user?></h3>
            <button name = 'logout'>LogOut</button>
        </form>

        <h1>Complaint Registration</h1>

        <form  method="post" enctype="multipart/form-data">
            
            <label for="category">Category:</label>        
                <select name="category" id="category" >
                    <option value="">Select Category </option>
                    <option value="Category 1" >Category 1</option>
                    <option value="Category 2">Category 2</option>   
                </select>
            <span>  <?php echo $empmsg_category;  ?> </span>
            <br>

            <label for="subcategory">Subcategory:</label>
                <select name="subcategory" id="subcategory" >
                    <option value="">Select Subcategory</option>
                    <option value="Subcategory1">Subcategory1</option>
                    <option value="Subcategory2">Subcategory2</option>
                </select>
            <span>  <?php echo $empmsg_subcategory;  ?> </span>
            <br>

            <label for="complaint_type">Complaint Type:</label>
                <select name="complaint_type" >
                    <option value="">Select Complaint Type</option>
                    <option value="Complaint">Complaint</option>
                    <option value="General Query">General Query</option>
                </select>
            <span>  <?php echo $empmsg_complaint_type;  ?> </span>
            <br>

            <label for="state">State:</label>
                <select name="state">
                    <option value="">Select State</option>
                    <option value="State 1">State 1</option>
                    <option value="State 2">State 2</option>
                </select>
            <span>  <?php echo $empmsg_state;  ?> </span>
            <br>

            <label for="nature_of_complaint">Nature of Complaint:</label>
                <input type="text" name="noc">
            <span>  <?php echo $empmsg_noc;  ?> </span>
            <br>

            <label for="complaint_details">Complaint Details :</label><br> 
                <textarea name="complaint_details" cols="50" rows="10"></textarea>
            <span>  <?php echo $empmsg_complaint_details;  ?> </span>
            <br>

            <button type="submit" name="submit">Submit Complaint</button>
            <input type="button" onclick="location.href='complaint_history.php';" value ='Cancel' />
        </form>

    </body>
</html>
