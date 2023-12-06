<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="styles/login.css">
    <script src="..\asset\loginValidate.js"></script>
    <script src="..\asset\loginAjax.js"></script>
</head>


<body>
<form id ="loginForm" method="post" action="../control/loginCheck.php" onsubmit="return checkLogin()">
    <fieldset align='center'>   
        <legend><h1>Login</h1></legend>
        <input type="text" name="user" id="user" placeholder="Username" required><br>
        <span id="userError" style="color: red;"></span><br>

        <input type="password" name="pass" id="pass" placeholder="Password" required><br>
        <span id="passError" style="color: red;"></span><br>
        <button type="submit" name="login">Log In</button>
    </fieldset>
</form>



</body>
</html>
