<?php

require_once('../model/userModel.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $id = $_POST['id'];
    $employer_name = $_POST['employer_name'];
    $contact_no = $_POST['contact_no'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $user_type = $_POST['user_type'];

    $updateData = array(
        'id' => $id,
        'employer_name' => $employer_name,
        'contact_no' => $contact_no,
        'username' => $username,
        'password' => $password,
        'user_type' => $user_type
    );

    if (updateUser($updateData)) {
        header('Location: ../view/adminHome.php'); // Redirect to the home page after successful update
    } else {
        echo "Failed to update user.";
    }
}

?>