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
        <title>Dashboard</title>
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
                        <!-- <a href="logout.php">&nbspLogout</a> -->
                    </p>
                </td>
            </tr>
            <tr>
                <td>
                    <fieldset>
                        <legend>Dashboard</legend>
                        <form method="post" action="" enctype="">
                            <table border="1" style="width:100%">
                                <tr>
                                    <td>
                                        <ul>
                                            <li><a href="dashboard.php">Dashboard</a></li>
                                            <li><a href="viewProfile.php">View Profile</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </td>
                                </form>
			  <td>

              <fieldset  >
              <form method="post" action="changepasswordval.php" enctype=""> 
		      <legend>CHANGE PASSWORD</legend>
            Current Password:<input type="password" name="current_password" value=""/> <br>
        <p style="color:green;">New Password    :  <input type="password" name="new_password"     value=""/> </p> 
		  <p style="color:red;">Retype Password :<input type="password" name="retyped_password" value=""/></p>  <br> 
                                                 <input type="submit" name="btn" value="Submit"/>
                                                 <input type="reset" name="reset" value="Reset">			 
              </form>	
		     </fieldset>
	         </td>
              </tr>
         </table>
        </form>		
		</fieldset>
		</td>
		</table>
    </body>
</html>