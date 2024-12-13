<?php
session_start();
include "./backend/database.php";

$login_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    $user_object = login($username, $password);

    if ($user_object !== null) {
        $_SESSION['user'] = $user_object;
        header("Location: feed.php");
        exit; // Always exit after header redirection
    } else {
        $login_message = "Nesprávné přihlašovací údaje.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 flex items-center justify-center h-screen">
    <div class="bg-white shadow-lg rounded-lg p-8 w-96">
        <h1 class="text-2xl font-bold mb-4 text-center">Login</h1>

        <?php if ($login_message): ?>
            <div class="bg-red-100 text-red-700 p-4 rounded mb-4"><?php echo $login_message; ?></div>
        <?php endif; ?>

        <form method="POST" class="space-y-4">
            <div>
                <label for="username" class="block text-gray-700 font-medium">Username</label>
                <input type="text" id="username" name="username" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <div>
                <label for="password" class="block text-gray-700 font-medium">Password</label>
                <input type="password" id="password" name="password" class="w-full border border-gray-300 rounded px-3 py-2 focus:ring-2 focus:ring-blue-500 focus:outline-none" required>
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 transition">Login</button>
        </form>

        <p class="mt-4 text-sm text-gray-600 text-center">
            Nemáte účet? 
            <a href="register.php" class="text-blue-500 hover:text-blue-600 font-medium">Registrujte se</a>
        </p>
    </div>
</body>
</html>
