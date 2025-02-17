<?php
$conn = new mysqli("localhost", "root", "", "portfolio_db");
if ($conn->connect_error) die("Connection failed: " . $conn->connect_error);
$result = $conn->query("SELECT * FROM portfolio_info WHERE id=1");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<div class="w-64">
        <?php include 'sidebar.php'; ?>
    </div>
<body class="bg-gradient-to-br from-blue-500 to-purple-600 min-h-screen flex">
    <main class="flex-1 bg-white min-h-screen flex items-center justify-center">
        <div class="w-full p-7">
            <h2 class="text-3xl font-semibold mb-6 text-center text-gray-800">Edit Profile</h2>
            <form method="POST" action="" enctype="multipart/form-data" class="space-y-4">
                <input type="text" name="first_name" value="<?php echo htmlspecialchars($row['first_name']); ?>" placeholder="First Name" required class="w-full p-3 border rounded-md">
                <input type="text" name="nickname" value="<?php echo htmlspecialchars($row['nickname']); ?>" placeholder="Nickname" required class="w-full p-3 border rounded-md">
                <input type="text" name="last_name" value="<?php echo htmlspecialchars($row['last_name']); ?>" placeholder="Last Name" required class="w-full p-3 border rounded-md">
                <input type="text" name="description" value="<?php echo htmlspecialchars($row['description']); ?>" placeholder="Description" required class="w-full p-3 border rounded-md">
                <textarea name="about_me" rows="5" placeholder="About Me" required class="w-full p-3 border rounded-md"><?php echo htmlspecialchars($row['about_me']); ?></textarea>
                <input type="file" name="profile_picture" accept="image/*" class="w-full p-3 border rounded-md">
                <button type="submit" name="submit" class="w-full bg-blue-600 text-white p-3 rounded-md">Save Changes</button>
            </form>

            <?php
            if (isset($_POST['submit'])) {
                $first_name = $_POST['first_name'];
                $nickname = $_POST['nickname'];
                $last_name = $_POST['last_name'];
                $description = $_POST['description'];
                $about_me = $_POST['about_me'];

                $target_dir = "uploads/";
                $target_file = $target_dir . basename($_FILES["profile_picture"]["name"]);
                move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $target_file);

                $sql = "UPDATE portfolio_info SET first_name='$first_name', nickname='$nickname', last_name='$last_name', description='$description', about_me='$about_me', profile_picture='$target_file' WHERE id=1";

                if ($conn->query($sql) === TRUE) {
                    echo "<p class='text-green-500 text-center mt-4'>Profile updated successfully!</p>";
                } else {
                    echo "<p class='text-red-500 text-center mt-4'>Error: " . $conn->error . "</p>";
                }
            }
            $conn->close();
            ?>

        </div>
    </main>
</body>
</html>
