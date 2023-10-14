<?php 
session_start();
    $current_password = trim($_POST['current_password']);
    $new_password = trim($_POST['new_password']);
	$retyped_password = trim($_POST['retyped_password']);
    if($current_password=="" || $new_password=="" || $retyped_password=="")
	{ header('location: changepassword.php?error=null'); }
		else if( $current_password==$_SESSION['user']['password'] and $retyped_password == $new_password){
        $_SESSION['user']['password']=$new_password;
        header('location: dashboard.php?message=password_change_success');
    }
	  else{ header('location: changePassword.php?error=null');}

?>
