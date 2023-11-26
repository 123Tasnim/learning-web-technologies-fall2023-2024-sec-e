<?php
// Include necessary files and configurations
require("userControl.php");
echo 'hi';

// Check if the complaint number is provided
if (isset($_POST['comno'])) {
    $comno = $_POST['comno'];

    // Perform any server-side logic to retrieve the complaint details based on the complaint number
    $complaintDetails = get_complaint_history_row($comno);
    echo 'hi';

    // You can send the retrieved data back to the client as a JSON response
    // For simplicity, let's assume $complaintDetails is an associative array
    echo json_encode($complaintDetails);
} else {
    // Handle the case where the complaint number is not provided
    echo "Complaint number is not provided.";
}
?>