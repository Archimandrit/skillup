<?php

$salt='gHn@6+5$';
$errorMessage=[];
if (empty($_POST)){
    $errorMessage[]='Введите логин и пароль';
} else {
    if (empty($_POST['login']) && $_POST['password']){
        $errorMessage[]='Введите логин и пароль';
    }
    if (empty($_POST['password']) && $_POST['password2'] ){
        $errorMessage[] = 'Введите пароль';
    }
    if(($_POST['password'] !== $_POST['password2'])){
        $errorMessage[] = 'Пароли не совпадают';
    }
    if($_POST['email']!== $_POST['email2']){
        $errorMessage[] = 'Email не совпадает';
    }

}


if (empty($errorMessage)) {
    try {
        $user=[
            'login' => $_POST['login'],
            'password' => $_POST['password'],
            'password2' => $_POST['password2'],
            'email' => $_POST['email'],
            'email2' =>$_POST['email2'],
        ];
        $db = dbConnect();
        $result = $db->prepare("
INSERT INTO Users (login, password, email)
VALUES (:login, :password,:email)");
        $result2 = $result->execute([
            'login' => $user['login'],
            'password' => md5($user['password'].$salt),
            'email' => $user['email'],
        ]);
    } catch (PDOException $e) {
    }
}
var_dump($_POST);
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