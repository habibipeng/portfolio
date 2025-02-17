<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);

$result = $conn->query("SELECT name, email, message, submitted_at FROM contacts ORDER BY submitted_at DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Messages</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="w-64">
        <?php include 'sidebar.php'; ?>
    </div>
<body class="bg-gray-100 min-h-screen flex">
    <main class="flex-1 p-8 bg-white min-h-screen">
        <h2 class="text-2xl font-bold mb-6 text-center text-gray-800">Messages</h2>
        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-300">
                <thead>
                    <tr class="bg-gray-200">
                        <th class="border border-gray-300 px-4 py-2">Name</th>
                        <th class="border border-gray-300 px-4 py-2">Email</th>
                        <th class="border border-gray-300 px-4 py-2">Message</th>
                        <th class="border border-gray-300 px-4 py-2">Submitted At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($row = $result->fetch_assoc()): ?>
                        <tr class="hover:bg-gray-100">
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['name']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo htmlspecialchars($row['email']); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo nl2br(htmlspecialchars($row['message'])); ?></td>
                            <td class="border border-gray-300 px-4 py-2"><?php echo $row['submitted_at']; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
