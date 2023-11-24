<?php 
    session_start();
    if (
        !isset($_SESSION['aid']) &&
        !isset($_SESSION['ausername']) &&
        !isset($_SESSION['atype'])

        
    ) {
        header('location: ../view/login.php');
    }
?>