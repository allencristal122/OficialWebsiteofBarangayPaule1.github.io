<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    include 'connection.php';
    // Function to upload file and return the file path
    function uploadFile($file, $folder)
    {
        $target_dir = $folder . "/";
        $target_file = $target_dir . basename($file["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        // Check if file already exists
        if (file_exists($target_file)) {
            $uploadOk = 0;
        }

        // Check file size (adjust as needed)
        if ($file["size"] > 500000) {
            $uploadOk = 0;
        }

        // Allow certain file formats
        if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
            $uploadOk = 0;
        }

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            return "";
        } else {
            if (move_uploaded_file($file["tmp_name"], $target_file)) {
                return $target_file;
            } else {
                return "";
            }
        }
    }

    // Upload 2x2 picture
    $picture = uploadFile($_FILES["file1"], "profile_pic");

    // Upload valid ID
    $valid_id = uploadFile($_FILES["file2"], "valid_id");

    // Insert data into database
    $sql = "INSERT INTO proof_of_identity (picture, valid_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $picture, $valid_id);

    if ($stmt->execute()) {
        // Success
        echo "Records inserted successfully.";
    } else {
        // Error
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close statement
    $stmt->close();

    // Close connection
    $conn->close();
}
?>