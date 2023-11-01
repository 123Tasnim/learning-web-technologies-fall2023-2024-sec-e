<?php
session_start();
$id = $_POST['id'];
$password = $_POST['password'];

if ($id == "" || $password == "") {
    header('Location: login.php?error=null');
    exit();
}

$con = mysqli_connect('localhost', 'root', '', 'labxm');
if (!$con) {
    die("Database connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM info WHERE id = '$id' AND password = '$password'";
$status = mysqli_query($con, $sql);

if ($status && mysqli_num_rows($status) > 0) {
    //$user = ['password' => trim($password), 'id' => trim($id)];
    $row = mysqli_fetch_assoc($status);
    $user = $row;
    $_SESSION['user'] = $user;
    if ($row['role'] === 'admin') {
        setcookie('status', 'true', time() + 3600, '/');
        header('Location: adminhome.php');
        exit();
    } else {
        setcookie('status', 'true', time() + 3600, '/');
        header('Location: userhome.php');
        exit();
    }
} else {
    header('Location: login.php?error=invalid');
    exit();
}

mysqli_close($con);
?>