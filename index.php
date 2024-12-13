<?php
$login_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        if ($username == 'admin' || $password == 'admin') {
            // uzivatel prihlasen
            session_start();
            $_SESSION['username'] = $username;
            header('Location: feed.php');
        } else {
            $login_message = 'Špatně zadané uživatelské jméno nebo heslo.';
        }
    } else {
        $login_message = 'Nezdali jste uživatelské jméno nebo heslo';
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