<?php

    include_once("../model/userModel.php");
    session_start();

    if ($_SERVER["REQUEST_METHOD"] == "POST") 
    {
        $s1 = $_POST["empuname"];

        $userinfo = searchemp($s1);

        if($userinfo){
            echo $userinfo['employer_name'] . ',' . $userinfo['company_name']. ',' . $userinfo['contact_no']. ',' . $userinfo['username']. ',' . $userinfo['password'];
        }
    }
?>
