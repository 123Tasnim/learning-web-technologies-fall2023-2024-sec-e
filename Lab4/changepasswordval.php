<?php
    session_start();
    if (isset($_SESSION['flag'])) {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $currentPassword = $_POST['current_password'];
            $newPassword = $_POST['new_password'];
            $retypeNewPassword = $_POST['retype_new_password'];

   
            $passwordRegex = '/^(?=.*[@#$%]).{8,}$/';

            if (strlen($newPassword) < 8 || !preg_match($passwordRegex, $newPassword)) {
                echo "Invalid New Password. Please enter a valid password.";
            } elseif ($newPassword !== $retypeNewPassword) {
                echo "New Password and Retyped Password did not match. Please try again.";
            } elseif ($currentPassword === $newPassword) {
                echo "New Password should not be the same as the Current Password. Please choose a different password.";
            } else {

                echo "Password change successful!";
            }
        }
    ?>

 