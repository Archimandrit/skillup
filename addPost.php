<?php
require_once 'functions/Functions.php';
require_once 'model/User123.php';

    $dbConn = dbConnect();
    $result = $dbConn->prepare("
    INSERT INTO Posts(text_content) VALUES (:text_content)
    ");



var_dump($_POST);


?>
<html>

<style>
    .container{
        margin: 10%  0 0 30%;
        display: inline-block;
    }
    .form-group{
        margin-top: 20px;
    }
</style>
<form method="POST">

    <div class="container">
             <label for="text">Введите текст</label>
        <div class="form-group">
            <textarea name="text" placeholder="введите текст"></textarea>
        </div>

        <div class="form-group">
            <label for="photo" class="control-label">Фото</label>
            <input type="file" class="form-control" name="photo">
        <div class="form-group">

        <button class="button">Отправить</button>

    </div>
</form>
</html>
