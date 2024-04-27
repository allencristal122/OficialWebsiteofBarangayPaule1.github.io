<?php
include 'connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST['name'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Prepare SQL statement
    $sql = "INSERT INTO receivemessages (name, age, email, message) VALUES (?, ?, ?, ?)";
    
    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("siss", $name, $age, $email, $message);

    // Execute the statement
    if ($stmt->execute()) {
        // Redirect to Contact1.php
        header("Location: Contact.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
