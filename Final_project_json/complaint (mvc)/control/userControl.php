<?php

    require_once("../model/page_model.php"); 
    require("sessionCheck.php"); 
    echo "<script src='../asset/validateForm.js'></script>";
        

    $comno=$category=$subcat=$complaintype=$state=$noc=$complaintdetials='';
    $empmsg_category= $empmsg_subcategory=$empmsg_complaint_type= $empmsg_state = $empmsg_noc=$empmsg_complaint_details=$empmsg_complaint_file='';


    function show_complaint_history_table(){
        global $user;
        return get_complaint_history_table($user);
    }

    function show_notification_table(){
        global $user;
        foreach(get_notification_table($user) as $r){
            echo "<tr>";
                echo "<td>$r[message]</td>";
                echo "<td>$r[timestamp]</td>";
                echo "<td>$r[status]</td>";
            echo "</tr>";
        }    
    }

    if(isset($_POST['back'])){
        // After displaying, update the status to 'read'
        'update_notification_table'($user);
        header("location:complaint_history.php");
    }
    
    if(isset($_POST['logout'])){
        setcookie('user','',time() - 1000,'/');
        header("location:../view/login.php");
    }
    
    if(isset($_POST['delete'])){
        'delete_complaint_history_row'($_POST['delete']);
    }

    if(isset($_POST['edit'])){
        $comno = $_POST['edit'];
        $e_res = get_complaint_history_row($comno);

        $category=$e_res['category'];
        $subcat=$e_res['subcat'];
        $complaintype=$e_res['complaintype'];
        $state=$e_res['state'];
        $noc=$e_res['noc'];
        $complaintdetials=$e_res['complaintdetials'];
    }

    if(isset($_POST['update'])){
        $comno = $_POST['comno'];
        $category=$_POST['category'];
        $subcat=$_POST['subcategory'];
        $complaintype=$_POST['complaint_type'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaint_details'];

        $err = 0;

        if(empty ($noc)) {
            $empmsg_noc = 'Fill up this field.'; $err+=1;
        }
        if(empty ($complaintdetials)) {
            $empmsg_complaint_details = 'Fill up this field.'; $err+=1;
        }
        if ($err == 0){  
            update_complaint_history_row($comno, $category, $subcat, $complaintype, $state, $noc, $complaintdetials);
        } 
    }

    if(isset($_POST['submit'])){

        $category=$_POST['category'];
        $subcat=$_POST['subcategory'];
        $complaintype=$_POST['complaint_type'];
        $state=$_POST['state'];
        $noc=$_POST['noc'];
        $complaintdetials=$_POST['complaint_details'];
        $compfile='';
        

        $err = 0;

        if(empty ($category)) {
            $empmsg_category = 'Please select a Category'; $err+=1;
        }

        if(empty ($subcat)) {
            $empmsg_subcategory = 'Please Select a Subcategory'; $err+=1;
        }

        if(empty ($complaintype)) {
            $empmsg_complaint_type = 'Please Select a Complaint type'; $err+=1;
        }

        if(empty ($state)) {
            $empmsg_state = 'Please Select a State'; $err+=1;
        }

        if(empty ($noc)) {
            $empmsg_noc = 'Please Write the nature of complaint'; $err+=1;
        }

        if(empty ($complaintdetials)) {
            $empmsg_complaint_details = 'Please Write some details'; $err+=1;
        }
        
        if ($err == 0){

            insert_complaint_history_row($user, $category, $subcat, $complaintype, $state, $noc, $complaintdetials, $compfile);
            header("location:complaint_history.php");
        } 

    }

?>
