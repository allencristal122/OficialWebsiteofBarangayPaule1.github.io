<?php
// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Include database connection
    include 'connection.php';

    // Get updated profile data from POST request
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $gender = $_POST['gender'];
    $religion = $_POST['religion'];
    $status = $_POST['status'];
    $occupation = $_POST['occupation'];
    $monthly_income = $_POST['monthly_income'];
    $allergies_conditions = $_POST['allergies_conditions'];
    $education = $_POST['education'];
    $emergency_person = $_POST['emergency_person'];
    $emergency_contact = $_POST['emergency_contact'];

    // Update profile data in the database
    $sql = "UPDATE ProfileData SET 
            firstname='$firstname', 
            middlename='$middlename', 
            lastname='$lastname', 
            birthdate='$birthdate', 
            email='$email', 
            contact='$contact', 
            gender='$gender', 
            religion='$religion', 
            status='$status'";

    // Update ImportantInfo data in the database
    $sql .= "UPDATE ImportantInfo SET 
            occupation='$occupation', 
            monthly_income='$monthly_income', 
            allergies_conditions='$allergies_conditions', 
            education='$education', 
            emergency_person='$emergency_person', 
            emergency_contact='$emergency_contact'";

    // Execute SQL queries
    if ($conn->multi_query($sql) === TRUE) {
        echo "success"; // Send success response to AJAX request
    } else {
        echo "Error updating profile: " . $conn->error; // Send error response to AJAX request
    }

    // Close database connection
    $conn->close();
}
?>
