<?php 
    session_start();
    //$id = $_POST['id'];
    if(!isset($_COOKIE['status'])){
        header('location: login.php?error=bad_request');
    }
    
    
    $con = mysqli_connect('localhost', 'root', '', 'labxm');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    
    $id = $_SESSION['user']['id'];
    $query = "SELECT username FROM info WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $username = isset($row['username']) ? $row['username'] : '';
    } else {
        $username = '';
    }
    mysqli_close($con);
?>

<html>
    <head>
        <title>Userhome</title>
    </head>
    <body>
        <table border="1" align="center">
            <tr>
                <td>
                    <!-- <img src="logo.png" height="40px" width="100px"></img>  -->
                    <h1>
                        <?php 
                        if(isset($_GET['message'])) {
                            if($_GET['message'] == 'password_change_success') {
                                echo "Password Change Successful";  
                            } else if($_GET['message'] == 'edit_profile_success') {
                                echo "Profile Editing Successful"; 
                            }  
                        }
                        ?>
                    </h1>
                    <p style="text-align:right;"> 
                        <?php echo "Logged in as ". $username ." | " ?>
                        <a href="logout.php">&nbspLogout</a>
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Dashboard</legend>
                        <form method="post" action="changepasswrod.php" enctype="">
                            <table border="1" style="width:100%">
                                <tr>
                                    <td>
                                        <ul>                                           
                                            <li><a href="viewProfile.php">View Profile</a></li>
                                            <li><a href="changePassword.php">Change Password</a></li>
                                            <li><a href="viewusers.php">View Users</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </td>
                                    <td>
                                        <h1>
                                            <?php 
                                            echo "Welcome, ". $username;
                                            ?>   
                                        </h1>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </fieldset>
                </td>
            </tr>
            
        </table>
    </body>
</html>
