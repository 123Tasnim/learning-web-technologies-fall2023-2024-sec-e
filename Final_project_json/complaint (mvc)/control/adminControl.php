<?php
    require_once("../model/page_model.php");
    require("sessionCheck.php"); 
    //session_start();

    
    if(isset($_POST['logout'])){
        setcookie('user','',time() - 1000,'/');
        header("location:login.php");
    }
   
    $category=$subcat=$complaintype=$state=$noc=$complaintdetials=$edit='';

    if(isset($_POST['delete'])){
        delete_complaint_history_row($_POST['delete']);
    }

    if(isset($_POST['view'])){
        $v_res = get_complaint_history_row($_POST['view']);
        $view = $_SESSION['view'] = $_POST['view'];

        $user = $_SESSION['u'] =  $v_res['user'];
        $status = $_SESSION['s'] = $v_res['status'];
        $category=$v_res['category'];
        $subcat=$v_res['subcat'];
        $complaintype=$v_res['complaintype'];
        $state=$v_res['state'];
        $noc=$v_res['noc'];
        $complaintdetials=$v_res['complaintdetials'];
        
        if($status == 'Sent'){
            $status = 'Viewed';
            update_complaint_history_status($view,$status);

            $message='Your Complaint has been Viewed';
            insert_notification_status($user, $message);
        }//then create if sent then update and notification
        
    }

    if(isset($_POST['stp'])){
        $view = $_SESSION['view'];
        $user = $_SESSION['u'];
        $status = $_SESSION['s'];

        if($status == 'Viewed'){
            $status = 'Cleared';
            update_complaint_history_status($view,$status);

            $message='Your Complaint has been Cleared';
            insert_notification_status($user, $message);
        }

        $_SESSION['view'] = '';
        $_SESSION['u'] = '';
        $_SESSION['s'] = '';
        header("location:../view/complaint_details.php");
    }
    
    function show_complaint_details_table(){
        foreach(get_complaint_details_table() as $r){ 
            echo "<tr>";
            echo "<td>$r[comno]</td>";
            echo "<td>$r[date]</td>";
            echo "<td>$r[status]</td>";                        
            echo "<td><button type='submit' name='view' value='$r[comno]'>View</button></td>";
            echo "</tr>";
        }
    }
?>