<?php
// Check if the request method is GET and if an 'id' parameter is set in the URL
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Include the database connection file
    include 'connection.php';

    // Retrieve the resident ID from the URL parameter
    $residentId = $_GET['id'];

    // SQL query to delete a resident record based on its ID
    $sql = "DELETE FROM residents WHERE id = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind the resident ID parameter to the prepared statement
    $stmt->bind_param("i", $residentId);

    // Execute the prepared statement
    if ($stmt->execute()) {
        // If deletion is successful, redirect to Resident.php
        header("Location: Resident.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during deletion, display error message
        echo "Error deleting record: " . $conn->error;
    }

    // Close the prepared statement
    $stmt->close();
    // Close the database connection
    $conn->close();
} else {
    // If the request method is not GET or 'id' parameter is not set, display error message
    echo "Invalid request";
}
?>