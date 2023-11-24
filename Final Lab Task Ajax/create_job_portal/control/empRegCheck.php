<?php

    include_once("../model/userModel.php");
    session_start();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $data = array(
            'e1' => $_POST['empname'],
            'e2' => $_POST['compname'],
            'e3' => $_POST['emp_cno'],
            'e4' => $_POST['empuname'],
            'e5' => $_POST['emppass']
        );

        $status = employerReg($data);
        if ($status) {
            echo "success";
        } else {
            echo "fail";
        }
    }
?>