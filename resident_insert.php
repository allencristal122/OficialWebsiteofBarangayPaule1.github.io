<?php
// Include the database connection file
include 'connection.php';

// Check if the request method is POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the name and temporary name of the uploaded photo file
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];

    // Move the uploaded photo file to the 'resident_photo' directory
    move_uploaded_file($tmp_name, "resident_photo/$photo");

    // Retrieve other resident information from the POST data
    $residentFullName = $_POST['residentFullName'];
    $residentBirthDate = $_POST['residentBirthDate'];
    $residentBirthPlace = $_POST['residentBirthPlace'];
    $residentAge = $_POST['residentAge'];
    $residentTotalHouseholds = $_POST['residentTotalHouseholds'];
    $residentContact = $_POST['residentContact'];
    $residentBloodType = $_POST['residentBloodType'];
    $residentCivilStatus = $_POST['residentCivilStatus'];
    $residentOccupation = $_POST['residentOccupation'];
    $residentMonthlyIncome = $_POST['residentMonthlyIncome'];
    $residentHousehold = $_POST['residentHousehold'];
    $residentLengthOfStay = $_POST['residentLengthOfStay'];
    $residentReligion = $_POST['residentReligion'];
    $residentNationality = $_POST['residentNationality'];
    $residentGender = $_POST['residentGender'];
    $residentEducation = $_POST['residentEducation'];

    // SQL query to insert resident data into the database
    $sql = "INSERT INTO residents (photo, full_name, birth_date, birth_place, age, total_households, contact, blood_type, civil_status, occupation, monthly_income, household, length_of_stay, religion, nationality, gender, education) 
            VALUES ('$photo', '$residentFullName', '$residentBirthDate', '$residentBirthPlace', '$residentAge', '$residentTotalHouseholds', '$residentContact', '$residentBloodType', '$residentCivilStatus', '$residentOccupation', '$residentMonthlyIncome', '$residentHousehold', '$residentLengthOfStay', '$residentReligion', '$residentNationality', '$residentGender', '$residentEducation')";

    // Execute the SQL query
    if ($conn->query($sql) === TRUE) {
        // If insertion is successful, redirect to Resident.php
        header("Location: Resident.php");
        exit(); // Terminate script execution
    } else {
        // If an error occurs during insertion, display error message
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>