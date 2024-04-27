<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish database connection
    include 'connection.php';

    // Retrieve form data from POST request
    $position = $_POST['position'];
    $full_Name = $_POST['barangayFullName'];
    $contacts = $_POST['barangayContact'];
    $barangayaddress = $_POST['barangayResident'];
    $start_Of_Term = $_POST['StartofTerm'];
    $end_Of_Term = $_POST['EndofTerm'];
    $photo_name = $_FILES['barangayPhoto']['name'];
    $tmp_name = $_FILES['barangayPhoto']['tmp_name'];

    // Define the target directory for uploaded files
    $target_dir = "photos/";
    // Generate a unique filename
    $target_file = $target_dir . basename($photo_name);

    // Move uploaded photo to specified directory
    move_uploaded_file($tmp_name, $target_file);

    // Prepare SQL statement for insertion
    $sql = "INSERT INTO barangay_officials (position, photo, fullName, contact, address, startOfTerm, endOfTerm) 
    VALUES (?,?,?,?,?,?,?)";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the prepared statement
    $stmt->bind_param("sssssss", $position, $photo_name, $full_Name, $contacts, $barangayaddress, $start_Of_Term, $end_Of_Term);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If insertion is successful, redirect to Barangay.php
        header("Location: Barangay.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during insertion, display error message
        echo "Error: ". $conn->error;
    }

    // Close the prepared statement
    $stmt->close();

    // Close database connection
    $conn->close();
}
?>
