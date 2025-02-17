<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen flex">
    <div class="w-64">
        <?php include 'sidebar.php'; ?>
    </div>
    <div class="flex-1 p-8 bg-white min-h-screen">
        <?php include 'messages.php'; ?>
    </div>
</body>
</html>
