<?php
session_start();
if(isset($_SESSION["user_id"])){
   $user_id = $_SESSION["user_id"]; 
}
else {
    $user_id = false;
}
    require "vendor/autoload.php";
    $db = new Photos\DB();
    $data = $db->get_all_photos();      
?>
<!doctype html>
<html lang ="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ЫЫЫ</title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport"content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="media.css">
    </head>
    <body>
              <?php include "header.php" ?>      
    <h2 id="fuck">Чтобы увидеть Матюки Авторизуйтесь!</h2>            
    <div id="grid">
            <?php foreach ($data as $photo): ?>
                <?= (new Photos\Photo($photo["Id"], $photo["Image"],$photo["Text"]))->get_html() ?>
            <?php endforeach; ?>
            </div> 
        <?php include "add_form.php";?>
        <div id="add_new_photo">
            <div>
                <input id="new_photo_src" type="text" placeholder="image">
                <input id="new_photo_text" type="text" placeholder="text">
                <button id="add_photo">Добавить</button>
                <button id="cancel">Отмена</button>
            </div>
        </div>
        <div id ="popup_photo">
            <img src ="" alt="">
        </div>
    </body>
    <script src="script.js"></script>
</html>