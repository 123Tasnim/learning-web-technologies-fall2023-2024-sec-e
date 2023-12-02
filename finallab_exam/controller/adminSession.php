<?php 
    session_start();
    if (
        !isset($_SESSION['aid'])&&
        !isset($_SESSION['ausertype'])
    )
    {
        header('location:../view/adminHome.php');
    }
?>