<?php

$gender=$_POST['gender'];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "Your selected gender is : ".$gender;
}

?>