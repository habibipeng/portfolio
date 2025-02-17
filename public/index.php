<?php
    // Profile data (hardcoded values)
    $name = "Jaspher 'Peng' Favillaran";
    $description = "Tech-Savvy Virtual Assistant";
    $about_me = "I am a detail-oriented virtual assistant with a strong background in technology and web development. Passionate about optimizing workflows and enhancing productivity through smart solutions.";
    $profile_picture = "../img/peng.jpg"; // You can change this path to the location of your image.
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Portfolio</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Inter', sans-serif; }
    </style>
</head>
<body class="bg-gradient-to-tr from-blue-50 to-blue-100 min-h-screen">
    <div class="max-w-6xl mx-auto p-6 flex flex-col md:flex-row items-center gap-10">
        <div class="w-full md:w-1/2">
            <img src="<?php echo htmlspecialchars($profile_picture); ?>" alt="Profile Picture" class="w-full h-auto object-cover rounded-3xl shadow-xl">
        </div>
        <div class="w-full md:w-1/2 text-center md:text-left space-y-6">
            <h1 class="text-5xl font-extrabold text-gray-800"> <?php echo htmlspecialchars($name); ?> </h1>
            <p class="text-2xl text-gray-600 font-semibold"> <?php echo htmlspecialchars($description); ?> </p>
            <p class="text-lg text-gray-700 leading-relaxed"> <?php echo htmlspecialchars($about_me); ?> </p>
            <div class="flex flex-wrap gap-4 justify-center md:justify-start mt-4">
                <a href="contact_me.php" class="bg-blue-600 text-white px-5 py-3 rounded-full hover:bg-blue-700 transition">Contact Me</a>
                <a href="cv.php" class="border-2 border-blue-600 text-blue-600 px-5 py-3 rounded-full hover:bg-blue-600 hover:text-white transition">View CV</a>
                <a href="#" class="bg-gray-800 text-white px-5 py-3 rounded-full hover:bg-gray-900 transition">My Projects</a>
                <a href="#" class="border-2 border-gray-800 text-gray-800 px-5 py-3 rounded-full hover:bg-gray-800 hover:text-white transition">Blog</a>
            </div>
        </div>
    </div>
</body>
</html>