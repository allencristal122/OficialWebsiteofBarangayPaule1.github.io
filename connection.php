<?php
    $conn = new mysqli('127.0.0.1:3308', 'root', '', 'barangay_paule1');

    if ($conn->connect_error) {
        die("Connection failed: ". $conn->connect_error);
    }
?>