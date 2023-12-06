<?php
// get_complaint_details using for comno matching 
require_once("../model/page_model.php"); 

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['comno'])) {
    $complaintNumber = $_GET['comno'];

    //  for the given complaint number
    $complaintDetails = get_complaint_history_row($complaintNumber);

    
    header("Content-Type: application/json");
    echo json_encode($complaintDetails);
    exit();
}
?>

