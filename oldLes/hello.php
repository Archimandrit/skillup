<h1>halo</h1>
<?php
define('SECOND_IN_DAY' , 86400);
define('PROJECT_NAME' , "skillup");
$currentDate = time();
$yesterday = $currentDate - SECOND_IN_DAY * 7;

echo $currentDate . "<br />";
echo date('d.m.Y H:i:s', $yesterday);
echo date('d.m.Y H:i:s') . "<br />:";

require_once 'template.php';
?>






<!DOCTYPE html>
<html>
<head>
<?php require_once 'include/head.php'; ?>
</head>
<body>
<div class="container">
    <div class="header">
        <div class="logo">
            <img src="hw/image/flag.png">
        </div>
        <div class="nav">
            <ul>
                <li><a href="posts.html">Лента</a></li>
                <li><a href="add">Добавить</a></li>
                <li><a href="about.html">О проекте</a></li>
            </ul>
        </div>
    </div>
    <div class="content">
        <div class="posts">
            <div class="post">
                <div class="header">
                    <div class="avatar">
                        <a href="http://google.com"><img src="hw/image/samurai.jpg" align="left"></a>
                    </div>
                    <div class="username">
                        <p><a href="http://google.com">#username</a></p>
                    </div>
                </div>
                <div class="body">
                    <div class="pic">
                        <img src="hw/image/block.jpg">
                    </div>
                    <div class="likes">
                        <img src="hw/image/like.png">
                    </div>
                    <div class="usercommentary">
                        Do you know de wey of the samurai?
                    </div>

                </div>
                <div class="footer">
                    <div>
                        <textarea name="Комментарий" rows="2" cols="60" placeholder="Оставить комментарий" ></textarea>
                    </div>
                    <div id="send">
                        <button class="button">Отправить</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>