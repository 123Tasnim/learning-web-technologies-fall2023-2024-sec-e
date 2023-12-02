<?php 
    session_start();
    if (
        !isset($_SESSION['eid'])&&
        !isset($_SESSION['eusertype'])
    )
    {
        header('location:../view/adminHome.php');
    }
?>