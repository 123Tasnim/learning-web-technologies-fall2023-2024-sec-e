<?php 
    session_start();
    if(!isset($_COOKIE['user'])){
        session_destroy();
        header("location:../view/login.php");
    }
    else{
        $_SESSION['user']=$_COOKIE['user'];
    }

    if(isset($_SESSION['user'])){
        $user = $_SESSION['user'];
    }
    else{header("location:../view/login.php");}
?>