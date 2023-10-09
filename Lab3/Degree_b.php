<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
</head>
<body>
    <form method="POST" action="" enctype="">
        <fieldset>
            <legend>Degree</legend>
            <input type="checkbox" name="deg" id="" value="SSC">SSC
            <input type="checkbox" name="deg1" id="" value="HSC">HSC
            <input type="checkbox" name="deg2" id="" value="BSc">BSc
            <input type="checkbox" name="deg3" id="" value="MSc">MSc<hr>
            <input type="submit" value="Submit">
        </fieldset>
    </form><br>
    
    <?php

    if($_SERVER["REQUEST_METHOD"]=="POST"){
        $deg=$_POST['deg'];
        $deg1=$_POST['deg1'];
        $deg2=$_POST['deg2'];
        $deg3=$_POST['deg3'];

        echo "Your selected degree are : ".$deg.",".$deg1.",".$deg2.",".$deg3;
    }

    ?>
</body>
</html>