<?php
session_start();
$current_password = trim($_POST['current_password']);
$new_password = trim($_POST['new_password']);
$retyped_password = trim($_POST['retyped_password']);

if ($current_password == "" || $new_password == "" || $retyped_password == "") {
    header('location: changepassword.php?error=null');
} else {
    $con = mysqli_connect('localhost', 'root', '', 'labxm');
    if (!$con) {
        die("Database connection failed: " . mysqli_connect_error());
    }

    $id = $_SESSION['user']['id'];
    $query = "SELECT password, role FROM info WHERE id = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        $stored_password = isset($row['password']) ? $row['password'] : '';
        $role = isset($row['role']) ? $row['role'] : '';

        if ($current_password == $stored_password && $new_password == $retyped_password) {
            $update_query = "UPDATE info SET password = '$new_password' WHERE id = '$id'";
            $update_result = mysqli_query($con, $update_query);
            if ($update_result) {
                $_SESSION['user']['password'] = $new_password;
                if ($role === 'admin') {
                    header('location: adminhome.php?message=password_change_success');
                } else {
                    header('location: userhome.php?message=password_change_success');
                }
            } else {
                header('location: changepassword.php?error=update_failed');
            }
        } else {
            header('location: changepassword.php?error=invalid_passwords');
        }
    } else {
        header('location: changepassword.php?error=query_failed');
    }

    mysqli_close($con);
}
?>
