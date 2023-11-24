<?php 
    session_start();
    if (
        !isset($_SESSION['eid'])

    ) {
        header('location: ../view/adminHome.php');
    }
?>