<?php
// Check if the request method is GET and if 'id' parameter is set
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    // Include the database connection file
    include 'connection.php';

    // Get the ID of the user to be deleted
    $userId = $_GET['id'];

    // SQL query to delete the user with the specified ID
    $sql = "DELETE FROM barangay_officials WHERE id=$userId";

    // Execute the SQL query
    $result = $conn->query($sql);

    // Check if the query was successful
    if ($result === TRUE) {
        // If deletion is successful, redirect to Barangay.php
        header("Location: Barangay.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during deletion, display error message
        echo "Error deleting record: " . $conn->error;
    }

    // Close database connection
    $conn->close();
}
?>