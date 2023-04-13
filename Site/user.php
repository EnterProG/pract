<?php
/*/$user_id = $_SESSION["user_id"] ?? false
Альтернативный способ условия
/*/
session_start();
if(isset($_SESSION["user_id"])){
   $user_id = $_SESSION["user_id"]; 
}
else {
    $user_id = false;
}

if($user_id){
   require "vendor/autoload.php";
   $db = new Photos\DB(); 
   $data = $db->get_user_photos($user_id);
}
if (isset($_GET["error"])){
    $error = "Вон отсюда и не заходи сюда";
}
if (isset($_GET["sign_error"])){
    $sign_error = "Вон отсюда логин занят";
}
if (isset($_GET["sign_success"])){
    $sign_success = "Молодец, ты смог";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
        <?php include "header.php" ?>  

    <?php if ($user_id): ?>
        <h1>Твоя херь</h1>
        <div id="grid">
            <?php foreach ($data as $photo): ?>
                <?= (new Photos\Photo($photo["Id"], $photo["Image"],$photo["Text"]))->get_html() ?>
            <?php endforeach; ?>
            </div> 
        <?php else: ?>
            <div class="form">
                <form action="login.php" method="post">
                    <h1>Аффтарисуйса ска</h1>
                    <input type = "text" placeholder ="Логин" name="login">
                    <input type = "password" placeholder ="Пароль" name="password">
                    <button>Вход</button>
                   <?php if (isset($_GET["error"])): ?>
                   <p class = "error"><?= $error = "Вон отсюда и не заходи сюда"?></p>
                   <?php endif ?>
                </form>
            </div>
            <div class="form">
                <form action="signup.php" method="post">
                    <h1>Регистрируйса ска</h1>
                    <input type = "text" placeholder ="Логин" name="login">
                    <input type = "password" placeholder ="Пароль" name="password">
                    <button>Регистрайца</button>
                   <?php if (isset($_GET["sign_error"])): ?>
                   <p class = "error"><?= $sign_error = "Вон отсюда с такими я дело не имею"?></p>
                   <?php endif ?>
                   <?php if (isset($_GET["sign_success"])): ?>
                   <p class = "success"><?= $sign_success = "Ну молодец, ты в базе"?></p>
                   <?php endif ?>
                </form>
            </div>
            <?php endif; ?>

            <?php include "add_form.php"; ?>
            <div id="add_new_photo">
            <div>
                <input id="new_photo_src" type="text" placeholder="Картинка">
                <input id="new_photo_text" type="text" placeholder="Подпись">
                <button id="add_photo">Добавить</button>
                <button id="cancel">Отмена</button>
            </div>
        </div>
            <div id ="popup_photo">
                <img src="" alt="">
            </div>

    <script src="script.js"></script>
</body>
</html>