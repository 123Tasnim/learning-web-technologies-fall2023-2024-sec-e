<?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $bg=$_POST['bg'];

    echo "Your blood group is : ".$bg;
}

?>