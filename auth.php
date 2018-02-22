<?php


$user=[
    'username' => 'admin',
    'password' => hashPassword(123),
];
function addAlertDanger($alerts, $message){
    $alerts[] =[
        'type' =>'danger',
        'message'=> $message
    ];
    return $alerts;
}
function addAlertSuccess($alerts, $message){
    $alerts[] =[
        'type' =>'success',
        'message'=> $message
    ];
    return $alerts;
}
function hashPassword($password,$salt = '@$%#7878ox_+hj'){
    $salt = '@$%#7878ox_+hj';
    $hash=password_hash($salt.$password, PASSWORD_BCRYPT);
    return $hash;
}
if ($_POST){
    $requestLogin = $_POST['username'];
    $requestPassword = hashPassword($_POST['password']);
    if(password_verify($_POST['password'] == $requestPassword) && $user['username'] == $requestLogin); {
            $alerts = addAlertSuccess($alerts, 'Вы авторизированы');
    }} else {
        $alerts = addAlertDanger($alerts, ' неверно');
    }
var_dump($_POST);
?>
<link   rel="stylesheet" href="https://maxcdn.bootsrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<div class="container">
    <div class="jumbotron">
        <form class="form-signin" method="POST">
            <input class="form-control" name="username" placeholder="Логин"/>
            <input type="password" class="form-control" name="password" placeholder="Пароль"/>
            <button class="btn btn-lg btn-primart btn-block" type="submit">Вход</button>
        </form>
    </div>
</div>
