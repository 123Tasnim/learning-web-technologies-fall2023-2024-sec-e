<?php

$con=new mysqli('localhost','root')
if ($con){

    echo "connetion successfull";
}
else{
    die(mysqli_error($con))
}



?>