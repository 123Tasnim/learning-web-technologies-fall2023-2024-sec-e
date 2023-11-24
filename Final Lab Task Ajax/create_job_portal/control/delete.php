<?php

    require_once('../model/userModel.php');
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) 
    {
        $userId = $_GET['id'];

        // Call the deleteUser function to delete the user
        $deleteStatus = deleteUser($userId);

        if ($deleteStatus) 
        {
            header("Location: ../view/adminHome.php");
            exit();
        } else 
        {
            echo "Failed to delete user.";
        }
    } else 
    {
        echo "Invalid request.";
    }

?>