<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Include the database connection file
    include 'connection.php';
    
    // Prepare the SQL statement to insert data into the 'certificates' table
    $stmt = $conn->prepare("INSERT INTO certificates (certificate_name, requirements, file) VALUES (?, ?, ?)");
    
    // Bind parameters to the prepared statement
    $stmt->bind_param("sss", $certificate_name, $requirements, $file_name);

    // Retrieve values from the POST data
    $certificate_name = $_POST["certificate"];
    $requirements = $_POST["requirements"];
    
    // Set up file upload
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $file_name = basename($_FILES["file"]["name"]);
    
    // Check if the target directory exists; if not, create it
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true); 
    }
    
    // Move the uploaded file to the target directory
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
        echo "The file ". htmlspecialchars(basename($_FILES["file"]["name"])). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If execution is successful, redirect to Forms.php
        header("Location: Forms.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during execution, display error message
        echo "Error: " . $stmt->error;
    }

    // Close the prepared statement and the database connection
    $stmt->close();
    $conn->close();
}
?>
