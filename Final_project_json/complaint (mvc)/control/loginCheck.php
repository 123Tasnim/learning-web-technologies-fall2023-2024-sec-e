<?php
    require_once("../model/page_model.php"); 
    
    session_start();

    if (isset($_POST['login'])) {
        $user = $_POST['user'];
        $pass = $_POST['pass'];
        $rem = $_POST['rem'] = true;

        list($res, $flag) = login($user, $pass);

        if($flag == 1){
            $_SESSION['user'] = $user;
            if($rem){setcookie('user',$user,time()+(60*60*24*365),'/');}
            else{setcookie('user',$user,time()+300,'/');}
            //echo $res['access'];
            switch ($res['access']){
                case 'u':
                    header("location:../view/complaint_history.php");
                    break;
                case 'a':
                    header("location:../view/complaint_details.php");
                    break;
                default:
                    echo "Error 404, Please contact administrator";
            }
        }
        else{
            echo 'Incorrect username or password';
        }
    }
?>
