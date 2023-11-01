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

    $username = isset($_SESSION['user']['username']) ? $_SESSION['user']['username'] : '';
    $id = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : '';
    $role = isset($_SESSION['user']['role']) ? $_SESSION['user']['role'] : '';
    $query = "SELECT * FROM info WHERE username ='$username' AND id = '$id' AND role = '$role'";
    $result = mysqli_query($con, $query);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $username = isset($row['username']) ? $row['username'] : '';
        $id = isset($row['id']) ? $row['id'] : '';
        $role = isset($row['role']) ? $row['role'] : '';

    } else {
        $username = '';
        $id = '';
        $role = '';
    }
    mysqli_close($con);
?>
<html>
    <head>
        <title>View Profile</title>
    </head>
    <body> 
	<table border="1" align="center">
	
	<tr>
  <td><!-- <img src="logo.png" height="60px" width="200px"></img>  -->
	
    <p style="text-align:right;"> 
      <?php echo "Logged in as ". $username ." | " ?>
      <a href="logout.php">&nbspLogout</a>
    </p>
	</td>	
	  </tr>
	
	<tr>
    <td>
        <fieldset>
			<legend>View Profile</legend>
        <form method="post" action="" enctype="">            
			  <table border="1"  style="width:100%">

              <tr>
                <td>
                      <ul>
                     <li><a href="<?php echo ($role === 'admin') ? 'adminhome.php' : 'userhome.php'; ?>">Dashboard</a></li>
                     <li><a href="changePassword.php">Change Password</a></li>
                     <li><a href="logout.php">Logout</a></li>
                    </ul> 
              </td>
			  <td>
        <fieldset>   
          <legend>Profile</legend> 
                <?php echo "Username: ".$username;?>  <br><br>
                <?php echo "ID: ".$id; ?> <br><br>
                <?php echo "Role: ".$role; ?> <br><br>
                </fieldset>
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
