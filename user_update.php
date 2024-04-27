<?php
// Include database connection
include 'connection.php';

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $userId = $_POST['users_id'];
    $fullName = $_POST['userFullName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $userType = $_POST['usertype'];

    // Sanitize form data to prevent SQL injection
    $userId = mysqli_real_escape_string($conn, $userId);
    $fullName = mysqli_real_escape_string($conn, $fullName);
    $userName = mysqli_real_escape_string($conn, $userName);
    $password = mysqli_real_escape_string($conn, $password);
    $userType = mysqli_real_escape_string($conn, $userType);

    // Check if userType is not empty and different from the existing value
    $updateUserType = '';
    if (!empty($userType)) {
        $updateUserType = ", userType='$userType'";
    }

    // Update user record in the database
    $sql = "UPDATE users SET fullName='$fullName', userName='$userName', password='$password' $updateUserType WHERE id='$userId'";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to Users.php after successful update
        header("Location: Users.php");
        exit();
    } else {
        // If update fails, display error message
        echo "Error updating user: " . $conn->error;
    }
}

// Close database connection
$conn->close();
?>
