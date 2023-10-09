
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Degree</title>
</head>
<body>
    <?php

            $deg = "";
            $deg1 = "";
            $deg2 = "";
            $deg3 = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $deg = isset($_POST['deg']) ? $_POST['deg'] : "";
            $deg1 = isset($_POST['deg1']) ? $_POST['deg1'] : "";
            $deg2 = isset($_POST['deg2']) ? $_POST['deg2'] : "";
            $deg3 = isset($_POST['deg3']) ? $_POST['deg3'] : "";
        }
            ?>
        <form method="POST" action="">
            <fieldset>
                <legend>Degree</legend>
                <input type="checkbox" name="deg" id="" value="SSC" <?php if ($deg == "SSC") echo "checked"; ?>>SSC
                <input type="checkbox" name="deg1" id="" value="HSC" <?php if ($deg1 == "HSC") echo "checked"; ?>>HSC
                <input type="checkbox" name="deg2" id="" value="BSc" <?php if ($deg2 == "BSc") echo "checked"; ?>>BSc
                <input type="checkbox" name="deg3" id="" value="MSc" <?php if ($deg3 == "MSc") echo "checked"; ?>>MSc<hr>
                <input type="submit" value="Submit">
            </fieldset>
        </form><br>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Your selected degrees are: " . $deg . ", " . $deg1 . ", " . $deg2 . ", " . $deg3;
}
    ?>
</body>
</html>