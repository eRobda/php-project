<?php
session_start();
if (!isset($_SESSION['user'])){
    header('Location: index.php');
    exit;
}

$user_object = $_SESSION['user'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex w-dvw">
    <div class="w-1/6 h-screen outline outline-1 outline-gray-400">
        
    </div>
    <div class="w-5/6 flex flex-col items-center">
            <div class="flex items-center w-2/5 mt-20 gap-20">
                <div class="w-1/3">
                    <img class="h-48 rounded-full" src="<?php echo $user_object['pfp']?>"/>
                </div>
                <div class="w-2/3 flex flex-col">
                    <div class="flex justify-between items-center">
                        <span class="font-semibold"><?php echo $user_object['username'] ?></span>
                        <button class="bg-neutral-200 px-4 py-1.5 rounded-lg text-sm font-bold">Upravit profil</button>
                    </div>
                    <div class="flex justify-between mt-5">
                        <div>Příspěvky</div>
                        <div>Sledující</div>
                        <div>Sleduji</div>
                    </div>
                    <div class="font-bold mt-5"><?php echo $user_object['display_name'] ?></div>
                    <div><?php echo $user_object['bio'] ?></div>
                </div>
            </div>
        </div>
</body>

</html>