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

    
    $sql = "SELECT * FROM notifications WHERE user = '$user' ORDER BY status, timestamp DESC";
    $result = mysqli_query($conn, $sql);

    if(isset($_POST['back'])){
        // After displaying, update the status to 'read'
        $updateSql = "UPDATE notifications SET status = 'read' WHERE user = '$user' AND status = 'unread'";
        mysqli_query($conn, $updateSql);

        header("location:complaint_history.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Notifications</title>
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
            <?php   
                while($r= mysqli_fetch_assoc($result)){ 
                    echo "<tr>";
                        echo "<td>$r[message]</td>";
                        echo "<td>$r[timestamp]</td>";
                        echo "<td>$r[status]</td>";
                    echo "</tr>";
                } 
            ?>
        </table>
    </body>
</html>
