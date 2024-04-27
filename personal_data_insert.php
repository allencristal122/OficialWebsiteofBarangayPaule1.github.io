<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'connection.php';

    // Prepare SQL statement to insert the record
    $sql = "INSERT INTO ProfileData (firstname, middlename, lastname, gender, birthdate, email, contact, religion, status, emergency_person, emergency_contact) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    // Bind parameters
    $stmt->bind_param("sssssssssss", $firstname, $middlename, $lastname, $gender, $birthdate, $email, $contact, $religion, $status, $emergency_person, $emergency_contact);

    // Set parameters from the form data
    $firstname = $_POST["firstname"];
    $middlename = $_POST["middlename"];
    $lastname = $_POST["lastname"];
    $gender = $_POST["gender"];
    $birthdate = $_POST["birthdate"];
    $email = $_POST["email"];
    $contact = $_POST["contact"];
    $religion = $_POST["religion"];
    $status = $_POST["status"];
    $emergency_person = $_POST["name"]; // Change to "name" instead of "emergency_person"
    $emergency_contact = $_POST["contact"]; // Change to "contact" instead of "emergency_contact"

    // Execute the prepared statement
    if ($stmt->execute()) {
        echo "success"; // Optional: return success message
    } else {
        echo "Error inserting record: " . $stmt->error; // Optional: return error message
    }

    // Close the prepared statement
    $stmt->close();

    // Close the database connection
    $conn->close();
} else {
    echo "Invalid request"; // Return error message for invalid request
}
?>
