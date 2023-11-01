








<?php
    $conn = mysqli_connect('localhost', 'root', '', 'product_db');
    if($conn) echo "connected";
    else echo "failed";
?>
<html>
    <head>
        <title>Home</title>
    </head>
    <body>
	 
	<table border="1" align="center">
	

	<tr> 
	<th><a href="login.php">Login</a></th>
	</tr>
	<tr>
	<th><a href="registration.php">Registration</a></th>
	</tr>
	</table>
    </body>
</html>