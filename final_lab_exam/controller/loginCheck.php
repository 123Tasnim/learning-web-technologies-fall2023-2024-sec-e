<?php
    include_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST['user_name'];
        $password = $_POST['pass'];

        $status = login($username, $password);

        if ($status['success']) 
        {
            if ($status["type"] === "admin") 
            {
                $_SESSION["aid"] = $status['id'];
                header("Location:../view/adminHome.php");   
            } 
            else 
            {
                //echo"User name or Password is wrong!";
                header("Location:../view/login.php");
            }
        } 
        else 
        {
            header("Location:../view/login.php");
        }
    }
?>

<?php

    include_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $username = $_POST['user_name'];
        $pass = $_POST['pass'];

        $userData = login($username, $pass);

        if ($userData['success']) 
        {
            //If login is successful
            $_SESSION['sid']=$userData['id'];
            header("Location:../view/adminHome.php");
        } 
        else 
        {
            //If login is unsuccessful
            header("location:../view/login.php");
        }
    } 
    else 
    {
        //Redirect if accessed without form submission
        header("location:../view/login.php");
    }
?>