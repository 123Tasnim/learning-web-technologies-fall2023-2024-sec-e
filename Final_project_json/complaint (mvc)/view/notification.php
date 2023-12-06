<?php  require("../control/userControl.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Notifications</title>


        <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        form {
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
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
            background-color: #45a049;
        }
    </style>
    </head>
    <body>
        <form method = "post">
            <h3>Welcome <?php echo $user?></h3>
            <button name='back'>Back</button>
            <button name = 'logout'>LogOut</button>
        </form>
        <br><br><br>
        <table border ="1">
            <tr>
                <th>Message</th>
                <th>Timestamp</th>
                <th>Status</th>
            </tr>
            <?php show_notification_table($user); ?>
        </table>

        <script>
        function confirmBack() {
            return confirm(" go back  and This will mark all notifications as read.");
        }
    </script>
    </body>
</html>
