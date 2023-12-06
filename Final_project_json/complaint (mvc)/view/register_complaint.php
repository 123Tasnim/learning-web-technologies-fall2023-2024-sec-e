<?php require("../control/userControl.php"); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Complaint Registration</title>
        <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 600px;
            margin: 20px;
            background-color: #fff;
            padding: 10px 20px 20px 20px;
            border-radius: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            color: #333;
        }

        button {
            background-color: #ED2B00;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        h1 {
            border-radius: 20px;
            text-align: center;
            display: block;
            background-color: aqua;
            margin-left: auto;
            margin-right: auto;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        select,
        input[type="text"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }

        span {
            color: red;
            font-size: 12px;
        }

        textarea {
            resize: vertical;
        }

        .formButton{
            background-color: #333;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 5px;
        }

        .submit:hover{
            background-color: #00CC00;
        }

        .cancel:hover{
            background-color: #DF0000;

        }

        form.top{
            padding: 20px;
            justify-content: right;
            margin-right: 10px;
            display: flex;
            width: 250px;
            top: 0px;
            right: 0px;
            position: absolute;
        }

        </style>

        <script src="../asset/validateForm.js"></script>
    </head>

    <body>
        <form class='top' method = "post">
            <h3>Welcome <?php echo $user?> &nbsp;</h3>
            <button name = 'logout'>LogOut</button>
        </form>

        <form method="post" onsubmit="return complaintForm()">
            <h1>Complaint Registration</h1>
            
            <label for="category">Category:</label>        
                <select name="category" id="category" >
                    <option value="">Select Category </option>
                    <option value="Category 1" >Category 1</option>
                    <option value="Category 2">Category 2</option>   
                </select>
            <span id='catErr'></span>
            <br>

            <label for="subcategory">Subcategory:</label>
                <select name="subcategory" id="subcategory" >
                    <option value="">Select Subcategory</option>
                    <option value="Subcategory1">Subcategory1</option>
                    <option value="Subcategory2">Subcategory2</option>
                </select>
            <span id='subcatErr'></span>
            <br>

            <label for="complaint_type">Complaint Type:</label>
                <select name="complaint_type" id="complaint_type">
                    <option value="">Select Complaint Type</option>
                    <option value="Complaint">Complaint</option>
                    <option value="General Query">General Query</option>
                </select>
            <span id='typeErr'></span>
            <br>

            <label for="state">State:</label>
                <select name="state" id='state'>
                    <option value="">Select State</option>
                    <option value="State 1">State 1</option>
                    <option value="State 2">State 2</option>
                </select>
            <span id='stateErr'></span>
            <br>

            <label for="nature_of_complaint">Nature of Complaint:</label>
                <input type="text" name="noc" id='noc'>
            <span id='nocErr'></span>
            <br>

            <label for="complaint_details">Complaint Details :</label> 
                <textarea name="complaint_details" id='complaint_details' cols="50" rows="10"></textarea>
            <span id='detailErr'></span>
            <br>

            <button type="submit" class='formButton submit' name="submit">Submit Complaint</button>
            <input type="button" class='formButton cancel' onclick="location.href='complaint_history.php';" value ='Cancel' />
        </form>

    </body>
</html>
