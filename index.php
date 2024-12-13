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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHPgram</title>
</head>

<body>
    <p><?php echo $login_message; ?></p>
    <form method="POST">
        <label for="username">Uživatelské jméno:</label>
        <input name="username" id="username" type="text" />

        <label for="password">Heslo:</label>
        <input name="password" type="password" id="password" />

        <input type="submit">
    </form>
</body>

</html>