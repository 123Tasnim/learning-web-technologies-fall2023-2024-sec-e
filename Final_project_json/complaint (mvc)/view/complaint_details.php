<?php require("../control/adminControl.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title> Complaint History</title>
    <style>

            .container {
                display: flex;
            }

            .left-side {
                flex: 1;
                padding: 20px;
            }

            .right-side {
                flex: 2;
                padding: 20px;
            }

            table {
                overflow-y: scroll;
                height: 550px;
                width: 500px;
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
                border: 1px solid #ddd;
            }

            th {
                position: sticky;
                top: 0;
                background-color: #00ccff;
                color: white;
            }

            fieldset {
                overflow-y: scroll;
                height: 550px;
                width: 100%; /* Adjust the width as needed */
                padding: 5px;
                border-radius: 5px;
                box-shadow:10px rgba(0, 0, 0, 0.1);
            }

            label {
                display: block;
                margin-bottom: 5px;
            }

            select,
            input[type="text"],
            textarea {
                width: 80%;
                padding: 8px;
                margin-bottom: 10px;
                border: 1px solid #ccc;
                border-radius: 3px;
                box-sizing: border-box;
            }

            textarea {
                resize: vertical;
            }

            button[type="submit"] {
                background-color: #333;
                color: #fff;
                border: none;
                padding: 10px 20px;
                cursor: pointer;
                border-radius: 5px;
            }

            button[type="submit"]:hover {
                background-color: #5bb450;
            }

            button[name="logout"] {
            background-color: #ED2B00;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
            position: auto;
            top: 10px;
            left: 10px;
            }

            button[name="logout"]:hover {
                background-color: #FF0000; 
            }
            

    </style>
   
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
            <?php show_complaint_details_table(); ?>
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
                <br>

            <label for="subcategory">Subcategory:</label>
                <select name="subcategory" id="subcategory">
                    <option value=<?php echo $subcat ?>><?php echo $subcat ?></option>
                    <option value="Subcategory1">Subcategory1</option>
                    <option value="Subcategory2">Subcategory2</option>
                </select>
            <br>

            <label for="complaint_type">Complaint Type:</label>
                <select name="complaint_type" >
                    <option value=<?php echo $complaintype ?>><?php echo $complaintype ?></option>
                    <option value="Complaint">Complaint</option>
                    <option value="General Query">General Query</option>
                </select>
            <br>

            <label for="state">State:</label>
                <select name="state">
                    <option value=<?php echo  $state ?>><?php echo  $state ?></option>
                    <option value="State 1">State 1</option>
                    <option value="State 2">State 2</option>
                </select>
            <br>

            <label for="nature_of_complaint">Nature of Complaint:</label>
                <input type="text" name="noc" value=<?php echo  $noc ?>>
            <br>

            <label for="complaint_details">Complaint Details :</label><br> 
                <textarea name="complaint_details" cols="50" rows="10"><?php echo  $complaintdetials ?></textarea>
            <br>

          


            <button type="submit" name="stp">Send to person</button>
        </form>
    </fieldset>

    <script type="text/javascript" src="/asset/validateForm.js"></script>  

</body>
</html>

