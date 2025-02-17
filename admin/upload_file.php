<?php
// Database connection
$conn = new mysqli('localhost', 'root', '', 'portfolio_db');
if ($conn->connect_error) {
    die('Connection failed: ' . $conn->connect_error);
}

// File upload handling
if (isset($_FILES['file'])) {
    $file_name = $_FILES['file']['name'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $upload_dir = 'uploads/';

    if (!is_dir($upload_dir)) {
        mkdir($upload_dir, 0777, true);
    }

    $file_path = $upload_dir . $file_name;

    if (move_uploaded_file($file_tmp, $file_path)) {
        $stmt = $conn->prepare("INSERT INTO uploads (file_name, file_path) VALUES (?, ?)");
        $stmt->bind_param('ss', $file_name, $file_path);
        $stmt->execute();
        echo "File uploaded successfully!";
    } else {
        echo "Failed to upload file.";
    }
}

