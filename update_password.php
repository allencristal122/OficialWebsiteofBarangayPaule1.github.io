<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve profile data from the form and sanitize them
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $middlename = filter_input(INPUT_POST, 'middlename', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $birthdate = $_POST['birthdate']; // No need to sanitize as it's a date
    $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL); // Validate email
    $contact = filter_input(INPUT_POST, 'contact', FILTER_SANITIZE_STRING);
    $gender = filter_input(INPUT_POST, 'gender', FILTER_SANITIZE_STRING);
    $religion = filter_input(INPUT_POST, 'religion', FILTER_SANITIZE_STRING);
    $status = filter_input(INPUT_POST, 'status', FILTER_SANITIZE_STRING);
    $occupation = filter_input(INPUT_POST, 'occupation', FILTER_SANITIZE_STRING);
    $monthly_income = filter_input(INPUT_POST, 'monthly_income', FILTER_SANITIZE_STRING);
    $allergies_conditions = filter_input(INPUT_POST, 'allergies_conditions', FILTER_SANITIZE_STRING);
    $education = filter_input(INPUT_POST, 'education', FILTER_SANITIZE_STRING);
    $emergency_person = filter_input(INPUT_POST, 'emergency_person', FILTER_SANITIZE_STRING);
    $emergency_contact = filter_input(INPUT_POST, 'emergency_contact', FILTER_SANITIZE_STRING);
    $address = filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
    $barangay = filter_input(INPUT_POST, 'barangay', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $province = filter_input(INPUT_POST, 'province', FILTER_SANITIZE_STRING);

    // Database connection
    include 'connection.php';

    // Prepare an SQL statement to update ProfileData
    $update_profile_sql = "UPDATE ProfileData SET ";
    $update_profile_sql .= "firstname=?, middlename=?, lastname=?, ";
    $update_profile_sql .= "birthdate=?, email=?, contact=?, ";
    $update_profile_sql .= "gender=?, religion=?, status=?, ";
    $update_profile_sql .= "occupation=?, monthly_income=?, ";
    $update_profile_sql .= "allergies_conditions=?, education=?, ";
    $update_profile_sql .= "emergency_person=?, emergency_contact=? ";
    $update_profile_sql .= "WHERE id=1"; // assuming id=1 for the user

    // Prepare and bind parameters for ProfileData update
    $stmt_profile = $conn->prepare($update_profile_sql);
    $stmt_profile->bind_param("sssssssssssssss", $firstname, $middlename, $lastname, $birthdate, $email, $contact, $gender, $religion, $status, $occupation, $monthly_income, $allergies_conditions, $education, $emergency_person, $emergency_contact);

    // Execute the ProfileData update statement
    if ($stmt_profile->execute()) {
        // Success message for ProfileData update
        echo "success";
    } else {
        // Error message for ProfileData update
        echo "error";
    }

    // Prepare an SQL statement to update ImportantInfo
    $update_important_info_sql = "UPDATE ImportantInfo SET ";
    $update_important_info_sql .= "address=?, barangay=?, city=?, province=? ";
    $update_important_info_sql .= "WHERE id=1"; // assuming id=1 for the user

    // Prepare and bind parameters for ImportantInfo update
    $stmt_important_info = $conn->prepare($update_important_info_sql);
    $stmt_important_info->bind_param("ssss", $address, $barangay, $city, $province);

    // Execute the ImportantInfo update statement
    if ($stmt_important_info->execute()) {
        // Success message for ImportantInfo update
        // You can do something here if needed
    } else {
        // Error message for ImportantInfo update
        // You can do something here if needed
    }

    // Close statements and connection
    $stmt_profile->close();
    $stmt_important_info->close();
    $conn->close();
} else {
    // Redirect back to the profile page if accessed directly
    header("Location: UserProfile.php");
    exit();
}
?>
