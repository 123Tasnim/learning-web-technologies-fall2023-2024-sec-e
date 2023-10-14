<?php
    session_start();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $checkbox = $_POST['checkbox'];

    if($username == "" || $password == ""){
        header('location: Login.php?error=null');

    }    
    else if($_SESSION['user']['username']== $username && $_SESSION['user']['password'] == $password && $checkbox==true){
        setcookie('status', 'true', time()+3600, '/');
        header('location: dashboard.php');
    }
    else if($_SESSION['user']['username']== $username && $_SESSION['user']['password'] == $password){
          setcookie('status', 'true', time()+600, '/');
          header('location: dashboard.php');
      }
    
    else{
        header('location: Login.php?error=invalid');
    }

?>
