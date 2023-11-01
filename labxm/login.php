<?php
session_start();
?> 

<html>
    <head>
        <title>Log In</title>
    </head>
    <body>
	 
	<table border="1" align="center">
	
	<tr>
	
	<p style="text-align:right;"> 
	<a href="web.php">WEB Home</a> 
	
	
	
	</p>
	</td>
	</tr>
	
	<tr>
    <td>
        <fieldset>
			<legend>LOGIN</legend>
        <form method="post" action="loginvalidation.php" enctype="">
              UserID: <input type="text" id="id" name="id" pattern="\d{2}-\d{5}-\d{1}"><br>
            Password: <input type="password" name="password" value=""/> <br>
             <input type="submit" name="btn" value="Submit"/>
			 <!--<a href=forgotpassword.php>Forgot Password?</a>-->
             <a href="registration.php">Registration</a>
        </form>		
		</fieldset>
    </td>
    </tr>		
	</table>
    </body>
</html>