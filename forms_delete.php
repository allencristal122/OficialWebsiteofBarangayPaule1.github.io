<?php
// Include the database connection file
include 'connection.php';

// Check if 'delete_id' is set in the POST data and not empty
if(isset($_POST['delete_id']) && !empty($_POST['delete_id'])) {
    // Retrieve the form ID from the POST data
    $formId = $_POST['delete_id'];
    
    // Construct SQL query to delete the record with the specified form ID
    $sql = "DELETE FROM certificates WHERE id = $formId";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If deletion is successful, redirect to Forms.php
        header("Location: Forms.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during deletion, display error message
        echo "Error deleting record: " . $conn->error;
    }
} else {
    // If 'delete_id' is not set or empty, display error message
    echo "Invalid form ID";
}

// Close the database connection
$conn->close();
?>