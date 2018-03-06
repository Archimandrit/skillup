<?php
define ('UPLOAD_DIR', 'upload/' );
require_once 'functions/Functions.php';
require_once 'model/User123.php';
$salt = 'gHn@6+5$';
$errorMessage = [];
$param = $_POST;
if (empty($_POST['password']) ){
    $errorMessage[] = 'Введите пароль';
}
if(($_POST['password'] !== $_POST['password2'])){
    $errorMessage[] = 'Пароли не совпадают';
}
if($_POST['email']!== $_POST['email2']){
    $errorMessage[] = 'Email не совпадает';
}
$user = new User123();



//$uploadUser = UPLOAD_DIR . 'users/';
//createPath($uploadUser);
//          ДОБАВЛЯЕТ ФАЙЛ С ДАННЫМИ ЧЕРЕЗ JSON

//    $filename = (uniqid() . '.txt');
//    $userinfo = fopen($uploadUser. $filename, ('w'));
//    fwrite($userinfo, json_encode($user, JSON_UNESCAPED_UNICODE .PHP_EOL ));
//    fclose($userinfo);

//if (isset($_FILES['photo']) && empty($_FILES['photo']['error'])) {
//$uploadPath = UPLOAD_DIR . 'photo/';
//createPath($uploadPath);


if (empty($errorMessage)) {
    $user->setLogin($param['login']);
    $user->setPassword($param['password']);
    $user->setEmail($param['email']);
    try {
        $dbReg = dbConnect();
        $result = dbConnect()->prepare("
INSERT INTO Users (login, password, email)
VALUES (:login, :password,:email)");
        $result2 = $result->execute([
            'login' => $user->getLogin(),
            'password' => md5($user->getPassword() .$salt),
            'email' => $user->getEmail(),
        ]);
    } catch (PDOException $e) {
    }
}

var_dump($user);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillUP | Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<style>
    body {
        margin: 150px 0 0 40% ;

    }
    .alert-danger {
        width:30%;
    }
</style>
<?php if ($errorMessage) { ?>
    <?php foreach ($errorMessage as $message) { ?>
        <div class="alert alert-danger">
            <?= $message ?>
        </div>
    <?php } ?>
<?php } ?>
<body>
<h4>Регистрация</h4>
<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="login" >Логин</label>
        <input id="login" name="login" placeholder="Введите логин" >
    </div>
    <div class="form-group">
        <label for="password">Пароль</label>
        <input type="password" id="password" name="password" placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <label for="password2">Проверка пароля</label>
        <input type="password" id="password2" name="password2" placeholder="Введите пароль">
    </div>
    <div class="form-group">
        <label for="email">email</label>
        <input id="email" name="email" placeholder="Введите email">
    </div>
    <div class="form-group">
        <label for="email2">проверка email</label>
        <input id="email" name="email2" placeholder="Введите email">
    </div>
    <button class="btn btn-primary">Зарегистрироваться</button>
</form>


</body>
</html>