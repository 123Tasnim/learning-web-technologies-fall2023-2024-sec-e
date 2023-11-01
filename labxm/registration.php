<html>
    <head>
        <title>Registration</title>
    </head>
    <body>
	 <table border="1" align="center">
      <h1>
<?php
if(isset($_GET['error']))
{
    if($_GET['error'] == 'null'){
          echo "Please input all the fields properly!";  
    }

   else if($_GET['error'] == 'no_match'){
        echo "Passwords do not match!";
    }
  
}     
?> 
</h1>
 
	<p style="text-align:right;"> 
	<a href="web.php">WEB Home</a> 
	<a href="login.php">Login</a>
	
	</p>
	</td>
	</tr>
	
	<tr>
        <td>
	       <form method="post" action="regvalidation.php" enctype="">
            <fieldset>
            <legend>REGISTRATION</legend>
            <table>			 			
			 	<table >
                <tr>
                    <td>
                        ID:
                    </td>
                    <td>
                        <!--<input type="number" name="id" value=""><br>-->
                        <input type="text" id="id" name="id" pattern="\d{2}-\d{5}-\d{1}">

                    </td>
                </tr>
                 
                <tr>
                    <td>
                        User Name:
                    </td>
                    <td>
                        <input type="text" id="username" name="username" value=""><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Password:
                    </td>
                    <td>
                        <input type="password" id="password" name="password" value=""><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        Confirm Password:
                    </td>
                    <td>
                        <input type="password" id="confirmPassword" name="confirmPassword" value=""><br>
                    </td>
                </tr>
                                  
                <tr>
                    <td colspan="2">
                        <fieldset>
                            <legend>User_Type :</legend> 
                            <label for="role">Role:</label>
                                <select id="role" name="role">
                                  <option value="user">User</option>
                                  <option value="admin">Admin</option>
                                </select><br>
                        </fieldset>
                        <input type="submit" name="submit" value="Submit">
                        
                    </td>
                 </tr>           
                </table>			 			
        </fieldset>
		</form>
		</td></tr>
	</table>
    </body>
</html>
