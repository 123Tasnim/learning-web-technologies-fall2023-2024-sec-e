 <?php

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $email=$_POST['email'];
    echo "Your  email is : ".$email;
}

?> 
