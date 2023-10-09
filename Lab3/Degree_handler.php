<?php
$deg = isset($_POST['deg']) ? $_POST['deg'] : "";
$deg1 = isset($_POST['deg1']) ? $_POST['deg1'] : "";
$deg2 = isset($_POST['deg2']) ? $_POST['deg2'] : "";
$deg3 = isset($_POST['deg3']) ? $_POST['deg3'] : "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Your selected degrees are: ";

    $selectedDegrees = [];

    if (!empty($deg)) {
        $selectedDegrees[] = $deg;
    }
    if (!empty($deg1)) {
        $selectedDegrees[] = $deg1;
    }
    if (!empty($deg2)) {
        $selectedDegrees[] = $deg2;
    }
    if (!empty($deg3)) {
        $selectedDegrees[] = $deg3;
    }

    if (empty($selectedDegrees)) {
        echo "None selected";
    } else {
        echo implode(", ", $selectedDegrees);
    }
}
?>
