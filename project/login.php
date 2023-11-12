<?php
    session_start();

    $conn = new mysqli('localhost','root','','complaint');

    $msg='';

    if (isset($_POST['login'])) {
        
        $user = $_POST['user'];
        $pass = $_POST['pass'];

        $sql = "select * from login where user ='$user' and pass = '$pass';";
        $res = mysqli_query($conn,$sql);
        $r = mysqli_fetch_assoc($res);
        
        if(mysqli_num_rows($res) == 1){
            $_SESSION['user'] = $user;
            if($r['access'] == 'u'){// for user
                header("location:complaint_history.php");
            }
            else if($r['access'] == 'a'){//for admin 
                header("location:complaint_details.php");
            }
        }
        else{$msg = 'Wrong Password<br>';}
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <form method="post">
        <fieldset align = 'center' style="width:20%;">
            <legend><h1>Login</h1></legend>
            Username: <input type="text" name="user" required><br><br>
            Password: <input type="password" name="pass" required><br><br>
            <span><?php echo $msg;?></span>
            <button name='login'>Log In</button>
        </fieldset>
    </form>

</body>
</html>
