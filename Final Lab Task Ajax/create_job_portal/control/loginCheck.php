<?php

    include_once ("../model/userModel.php");
    session_start();

    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $username = $_POST["user_name"];
        if (empty($username))
        {
            $_SESSION["username_err"] = "Username cannot be empty!";
        }
        
        $password = $_POST["pass"];
        if (empty($password))
        {
            $_SESSION["pass_err"] = "Password cannot be empty!";
        }
        
        if(empty($_SESSION["uname_err"]) && empty($_SESSION["pass_err"])){ 

            $result = login($username, $password);
            if ($result['success']) {
               
                if($result['type']=="admin"){
                    
                    $_SESSION['aid'] = $result['id'];
                    $_SESSION['auname'] = $result['username'];
                    $_SESSION['atype'] = $result['type'];

                    header("location:../view/adminHome.php");
                }
            } 
            else
            {   //database error occurred
                $_SESSION["unotexist"] = "Incorrect username or password!";
                header("location:../view/login.php");
            }
        }
        else{ // validation error found
            header("location:../view/login.php");
        }
    }
?>
