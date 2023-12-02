<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $emp_name = $_POST["emp_name"];
    $cont_no = $_POST["cont_no"];
    $emp_uname = $_POST["emp_uname"];
    $emp_pass = $_POST["emp_pass"];

   
    if (empty($emp_name) || empty($cont_no) || empty($emp_uname) || empty($emp_pass)) {
        echo "All fields are required";
    } else {
       
        $conn = new mysqli("your_db_host", "your_db_username", "your_db_password", "your_db_name");

    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

     
        $sql = "INSERT INTO employers (emp_name, cont_no, emp_uname, emp_pass) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $emp_name, $cont_no, $emp_uname, $emp_pass);
        
        if ($stmt->execute()) {
            echo "Registration successful";
        } else {
            echo "Error: " . $stmt->error;
        }

        
        $stmt->close();
        $conn->close();
    }
}
?>
