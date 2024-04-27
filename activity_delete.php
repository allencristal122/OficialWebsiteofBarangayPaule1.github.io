<?php
    // Establish database connection
    include 'connection.php';
    
    // Check if 'id' parameter is set in the URL and is numeric
    if (isset($_GET['id']) && is_numeric($_GET['id'])) {
        // Get the activity ID from the URL
        $activityId = $_GET['id'];
    
        // Prepare SQL statement to delete activity by ID
        $stmt = $conn->prepare("DELETE FROM Activity WHERE id = ?");
        
        // Bind the activity ID parameter
        $stmt->bind_param("i", $activityId);
    
        // Execute the prepared statement
        if ($stmt->execute()) {
            // If deletion is successful, redirect to Activity.php
            header("Location: Activity.php");
            exit(); // Terminate script execution
        } else {
            // If an error occurs during deletion, display error message
            echo "Error deleting activity: " . $conn->error;
        }
    
        // Close the prepared statement
        $stmt->close();
    } else {
        // If 'id' parameter is missing or invalid, display error message
        echo "Invalid activity ID.";
    }
    
    // Close database connection
    $conn->close();
?>