<?php

    include_once("../model/userModel.php");
    session_start();
    
    if($_SERVER["REQUEST_METHOD"] =="POST"){

        $data =array(
            'a1' => $_POST['admin_name'],
            'a2' => $_POST['admin_cno'],
            'a3' => $_POST['admin_uname'],
            'a4' => $_POST['adminpass']
        );

        $status = adminReg($data);
        if($status)
        {
            echo "success";
        }
        else
        {
            echo "fail";
        }
    }

?>
