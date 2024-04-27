<?php
    // Establish database connection
    include 'connection.php';
    
    // Check if the form is submitted using POST method
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the name and temporary name of the uploaded photo file
        $photos = $_FILES['photo']['name'];
        $tmp_name = $_FILES['photo']['tmp_name'];
    
        // Move the uploaded photo to the 'activity_photos' directory
        move_uploaded_file($tmp_name, "activity_photos/$photos");
        
        // Retrieve data from the form
        $date = $_POST['date'];
        $activity = $_POST['activity'];
        $description = $_POST['description'];
    
        // SQL query to insert data into the 'Activity' table
        $sql = "INSERT INTO Activity (photos, date, activity, description) VALUES ('$photos', '$date', '$activity', '$description')";
        
        // Execute the SQL query
        if ($conn->query($sql) === TRUE) {
            // If insertion is successful, redirect to Activity.php
            header("Location: Activity.php");
            exit(); // Terminate script execution
        } else {
            // If an error occurs during insertion, display error message
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    
    // Close database connection
    $conn->close();
?>
