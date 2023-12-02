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
        header('Location: ../view/adminHome.php'); 
        exit(); 
    } else {
        echo "Failed to update user.";
    }
}

// Fetch the user details for pre-filling the form
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $userId = $_GET['id'];
    $userInfo = searchempById($userId);
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Update User</title>
    </head>
    <body>
        <form action="update.php" method="POST">
            <input type="hidden" name="id" value="<?= $userId ?>">
            <label>Employer Name:</label>
            <input type="text" name="employer_name" value="<?= $userInfo['employer_name'] ?>"><br>

            <label>Contact No:</label>
            <input type="text" name="contact_no" value="<?= $userInfo['contact_no'] ?>"><br>

            <label>User Name:</label>
            <input type="text" name="username" value="<?= $userInfo['username'] ?>"><br>

            <label>Password:</label>
            <input type="password" name="password" value="<?= $userInfo['password'] ?>"><br>

            <label>User_Type:</label>
            <input type="text" name="type" value="<?= $userInfo['user_type'] ?>"><br>

            <input type="submit" value="Update">
        </form>
    </body>
    </html>
<?php
}
?>
