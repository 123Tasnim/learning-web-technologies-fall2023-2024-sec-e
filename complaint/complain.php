<?php

include 'connect.php';

if(isset($_post['submit']))
{

    $complaintnumber=$_POST['complaintnumber'];
    $category=$_POST['category'];
    $naturecomplaint=$_POST['naturecomplaint'];
    $complaintdetails=$_POST['complaintdetails'];
    $remark=$_POST['remark'];
    $regdate=$_POST['regdate'];

    
    $sql="insert into 'comp'(complaintnumber,category,naturecomplaint,complaintdetails,remark,regdate) 
    values ( '$complaintnumber',' $category','$naturecomplaint', '$complaintdetails',
   '$remark','$regdate');
   $result=mysqli_query($con,$sql);
    if($result){
        echo "Data ininserted successfully";
    else{
        die(mysqli_error($con))
    }


}
?>




!DOCTYPE html>
<html lang="en">
<html>
    <head>
        <title>Complaint Details</title>
    </head>
    <body>
	 
	<table border="1" style="width: 70%; margin-left:auto;margin-right:auto;">
	
	
	<tr>
    <td>
        <fieldset style="width:200px">
			<legend>complaint</legend>
            Complaint Number:<input type="text" name="complaintnumber " value=""/> <br>
            Category:<input type="text" name="category" value=""/> <br>
            Nature of Complaint <input type="text" name="naturecomplaint" value=""/> <br>
            Complaint Details: <input type="text" name="complaintdetails" value=""/> <br>
            Remark:<input type="text" name="remark" value=""/> <br>
            Regestation Date: <input type="text" name=" regdate"size="1"> /
        <input type="text" name="Month"size="1"> /
        <input type="text" name="Year" size="1">
        <hr>

        <input type="Submit" value="Submit" >

       		
		</fieldset>
    </td>
    </tr>		
	
		</table>
    </body>
</html>
?>