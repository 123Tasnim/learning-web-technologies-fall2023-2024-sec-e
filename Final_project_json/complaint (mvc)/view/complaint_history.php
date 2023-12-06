<?php require("../control/userControl.php"); ?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script type="text/javascript" src="/asset/searchComplaints.js"></script>
    
    <title> Complaint History</title>
  
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 15px;
            background-color: #f4f4f4;
        }

        h3 {
            color: #333;
        }

        table, th, td, tr{
            border-style: solid;
            border-color: #00ccff;
            border-width: 1px;
        }

        table {
            overflow-y: scroll;
            height: 450px;
            width: auto;
            border-collapse: collapse;
            border-width: 3px;
            margin-top: 20px;
            display: inline-block;
        }

        tr {
            height: 50px;
        }

        tr:hover {
            background-color: #ccf5ff;
        }

        th, td {
            padding: 10px;
            text-align: left;
            text-align: center;
        }

        th {
            position: sticky;
            top: 0;
            background-color: #00ccff;
        }

        button {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            margin-right: 10px;
            border: none;
            cursor: pointer;
        }

        button:hover {
            background-color:#ED2B00 ;
        }

        input[type="button"] {
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        input[type="button"]:hover {
            background-color: #005A7E;
        }

        fieldset {
            border: 1px solid #ddd;
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            margin-top: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        label {
            display: inline-block;
            margin-bottom: 5px;
        }

        select, input[type="text"], textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            background-color: #008CBA;
            color: white;
            padding: 10px 15px;
            border: none;
            cursor: pointer;
        }

        button[type="submit"]:hover {
            background-color: #005A7E;
        }

        button.tableButton{
            width: 100px;
            padding: 8px 16px;            
            margin-left: auto;
            margin-right: auto;
        }

        span.error {
            color: red;
            font-size: 80%;
            margin-bottom: 10px;
            display: block;
        }
    </style>

    <!-- <script src="../asset/validateForm.js"></script> -->
   


</head>

<body>

    <form method = "post">
        <h3>Welcome <?php echo $user?></h3>
        <input type="button" onclick="location.href='register_complaint.php';" value ='New Complaint' />
        <input type="button" onclick="location.href='notification.php';" value ='Notifications' />
        <!-- <button type="button" id="searchBtn" onclick="searchComplaints()">Search</button> -->
        <!-- <button onclick="searchComplaints()">Search</button> -->



        <button name = 'logout'>LogOut</button>
    </form>

    <br><br>

    <form method = 'post'>
        <table>
            <thead>
                <th>Complaint Number </th>
                <th>Reg Date </th>
                <th> Status</th>
                <th colspan="2"> Action </th>
            </thead>
            <tbody>
                <?php $complaint_histories = show_complaint_history_table(); ?>
                <?php  foreach($complaint_histories as $r){ ?>
                    <tr>
                       <td><?php echo $r['comno'] ?></td>
                        <td><?php echo $r['date'] ?></td>
                        <td><?php echo $r['status'] ?></td>
                        <?php if($r['status'] == 'Sent'){  ?>                   
                            <td><button class='tableButton' type='button' onclick="editComplaint(<?php echo $r['comno']; ?>)">Edit</button></td>
                            <td><button class='tableButton' type='submit' name='delete' value="<?php echo $r['comno']?>" >Delete</button></td>
                        <?php } else{ ?> <td colspan = 2></td> <?php }?>
                    </tr>
                <?php } ?>

            </tbody>
      </table>
    </form>
                
    <fieldset style="width:40%;right:30px;top:30px; position:absolute">
        <form  method="post" onsubmit="return checkForm()">
                
            <label>Complaint Number:</label>
                    <input type="text" name="comno" id='comno' value="<?php echo  $comno ?>" readonly>
                <br>

                <label for="category">Category:</label>        
                    <select name="category" id="category" >
                        <option value="<?php echo $category ?>"><?php echo $category ?></option>
                        <option value="Category 1" >Category 1</option>
                        <option value="Category 2">Category 2</option>   
                    </select>
                <br>

                <label for="subcategory">Subcategory:</label>
                    <select name="subcategory" id="subcategory">
                        <option value="<?php echo $subcat ?>"><?php echo $subcat ?></option>
                        <option value="Subcategory1">Subcategory1</option>
                        <option value="Subcategory2">Subcategory2</option>
                    </select>
                <br>

                <label for="complaint_type">Complaint Type:</label>
                    <select name="complaint_type" id="complaintype">
                        <option value="<?php echo $complaintype ?>"><?php echo $complaintype ?></option>
                        <option value="Complaint">Complaint</option>
                        <option value="General Query">General Query</option>
                    </select>
                <br>

                <label for="state">State:</label>
                    <select name="state">
                        <option value="<?php echo  $state ?>"><?php echo  $state ?></option>
                        <option value="State 1">State 1</option>
                        <option value="State 2">State 2</option>
                    </select>
                <br>

                <label for="nature_of_complaint">Nature of Complaint:</label>
                    <input type="text" name="noc" value="<?php echo  $noc ?>">
                <span>  <?php echo $empmsg_noc;  ?> </span>
                <br>

                <label for="complaint_details">Complaint Details :</label><br> 
                    <textarea id="complaint_details" name="complaint_details" rows="5" style="overflow-y: auto;"><?php echo  $complaintdetials ?></textarea>
                <span>  <?php echo $empmsg_complaint_details;  ?> </span>
                <br>


                
                <button type="submit" name="update">Update</button>
        </form>
    </fieldset>
    <script src="../asset/ajax.js"></script>
       
    
</body>
</html>

