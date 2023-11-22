<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "emp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
if ($_POST['action'] == 'searchEmployee') {
    $searchQuery = $_POST['query'];
    $sql = "SELECT * FROM employers WHERE employer_name LIKE '%$searchQuery%'";
    $result = $conn->query($sql);

    $employees = [];
    while ($row = $result->fetch_assoc()) {
        $employees[] = $row;
    }

    if (count($employees) > 0) {
        foreach ($employees as $employee) {
            echo '<p><strong>Employer:</strong> ' . $employee['employer_name'] .
                 ' | <strong>Company:</strong> ' . $employee['company_name'] .
                 ' | <strong>Contact:</strong> ' . $employee['contact_no'] .
                 ' | <strong>Username:</strong> ' . $employee['username'] . '</p>';
        }
    } else {
        echo '<p>No employees found.</p>';
    }


}

$conn->close();
?>
