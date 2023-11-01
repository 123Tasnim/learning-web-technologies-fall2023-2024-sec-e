
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $email = $_POST["email"];

    // Create or open the text file for writing
    $file = fopen("data.txt", "a"); // "a" for append mode

    if ($file) {
        // Prepare the data as a string
        $data = "Name: $name, Email: $email\n";

        // Write the data to the file
        fwrite($file, $data);

        // Close the file
        fclose($file);

        echo "Data has been successfully saved to data.txt.";
    } else {
        echo "Failed to open the file for writing.";
    }
} else {
    echo "Invalid request.";
}


