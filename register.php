<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Register</h1>

        <?php
        include "./backend/database.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = $_POST['username'];
            $password = $_POST['password'];
            $display_name = $_POST['display_name'];
            $email = $_POST['email'];
            $bio = $_POST['bio'];
            $pfp = $_POST['pfp'];

            // Validate email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<div class="bg-red-100 text-red-700 p-4 rounded mb-4">Invalid email address. Please try again.</div>';
            } else {
                $db = Database::getInstance();
                $success = $db->register($username, $password, $display_name, $email, $bio, $pfp);

                if ($success) {
                    echo '<div class="bg-green-100 text-green-700 p-4 rounded mb-4">Registration successful!</div>';
                } else {
                    echo '<div class="bg-red-100 text-red-700 p-4 rounded mb-4">Registration failed. Please try again.</div>';
                }
            }
        }
        ?>

        <form method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-gray-700">Username</label>
                <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div>
                <label for="display_name" class="block text-gray-700">Display Name</label>
                <input type="text" id="display_name" name="display_name" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <div>
                <label for="email" class="block text-gray-700">Email</label>
                <input type="email" id="email" name="email" class="w-full border border-gray-300 rounded px-3 py-2" required>
            </div>
            <div>
                <label for="bio" class="block text-gray-700">Bio</label>
                <textarea id="bio" name="bio" class="w-full border border-gray-300 rounded px-3 py-2"></textarea>
            </div>
            <div>
                <label for="pfp" class="block text-gray-700">Profile Picture URL</label>
                <input type="text" id="pfp" name="pfp" class="w-full border border-gray-300 rounded px-3 py-2">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded">Register</button>
        </form>
    </div>
</body>
</html>
