<?php
$username = $_GET['username'];
$studentDetails = [
    'username' => 'tasnim',
    'email' => 'tasnimsumiyahur25@gmail.com',
    'password' => '1234',
    'id' => '448512',
    'cgpa' => '3.7',
    'gender' => 'Female',
    'phone' => '01979808702',
    
];

// Send JSON response
header('Content-Type: application/json');
echo json_encode($studentDetails);
?>