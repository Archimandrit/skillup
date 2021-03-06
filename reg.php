<?php
define('UPLOAD_DIR', 'upload/');
require_once 'model/User.php';
require_once 'functions.php';
require_once 'DB.php';
require_once 'config/Config.php';
$GLOBALS['alerts'] = [];
$param = $_POST;

var_dump($_POST);
function createPath($path) {
    $isSuccess = false;
    if (!file_exists($path)) {
        $isSuccess = mkdir($path, 0777, true);
    }
    return $isSuccess;
}
if ( isset($param['is_agree']) ) {
    // Создание пользователя
    $user = new User();
    $user->setFirstname($param['firstname']);
    $user->setLastname($param['lastname']);
    $user->setPassword($param['password']);
    $user->setSex($param['sex']);
    $user->setAge($param['age']);
    $user->setGrowth($param['growth']);
    if (isset($param['stack_learn'])) {
        $user->setStackLearn($param['stack_learn']);
    }
    if (isset($_FILES['photo']) && empty($_FILES['photo']['error'])) {
        $uploadPath = UPLOAD_DIR . 'photo/';
        createPath($uploadPath);
        move_uploaded_file($_FILES['photo']['tmp_name'], $uploadPath . uniqid() . '.png');
    }
    // Валидация
    if (!$user->isValidFullName()) {
        addAlertDanger('Имя и Фамилия не должны бать короче 3х символов');
    }
    if (
    !(
        in_array('html', $user->getStackLearn()) &&
        in_array('php', $user->getStackLearn())
    )
    ) {
        addAlertDanger('Требуется html и php');
    }
    if (empty($errorMessage)) {
        $db = new DB();
        $db->execute("
            INSERT INTO users (firstname, lastname, password, age, growth)
            VALUES (:firstname, :lastname, :password, :age, :growth);
        ", [
            'firstname' => $user->getFirstname(),
            'lastname' => $user->getLastname(),
            'password' => $user->getPassword(),
            'age' => $user->getAge(),
            'growth' => $user->getGrowth(),
        ]);
    }
}

?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SkillUP | Регистрация</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<?php foreach ($GLOBALS['alerts'] as $alert) { ?>
    <div class="alert alert-<?= $alert['type'] ?>">
        <?= $alert['message'] ?>
    </div>
<?php } ?>

<div class="container-fluid jumbotron col-md-offset-4 col-md-5">

    <?php if (isset($user)) { ?>
        <h3>Мы изучаем:</h3>
        <ul>
            <?php foreach ($user->getStackLearn() as $lang) { ?>
                <li><?= $lang ?></li>
            <?php } ?>
        </ul>

        <h3>Наши фрукты:</h3>
        <ul>
            <?php foreach (explode(', ', $user->getListFruits()) as $fruit) { ?>
                <li><?= $fruit ?></li>
            <?php } ?>
        </ul>

        <h3>Мы изучаем: <?= implode(', ', $user->getStackLearn()) ?>.</h3>
    <?php } ?>


    <hr />

    <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">Имя</label>
            <input class="form-control" id="firstname" name="firstname"
                   value="<?= (isset($param['firstname'])) ? $param['firstname'] : 'Тест' ?>" placeholder="Имя">
        </div>
        <div class="form-group">
            <label for="lastname">Фамилия</label>
            <input class="form-control" id="lastname" name="lastname"
                   value="<?= (isset($param['lastname'])) ? $param['lastname'] : 'Тест' ?>" placeholder="Фамилия">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Пароль</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="Пароль">
        </div>
        <div class="form-group">
            <label for="photo" class="control-label">Фото</label>
            <input type="file" class="form-control" name="photo">
        </div>
        <div class="form-group">
            <label for="password" class="control-label">Пол:</label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="male" value="0" checked> Мужской
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="female" value="1"> Женский
            </label>
        </div>
        <div class="form-group">
            <label for="age" class="control-label">Возраст</label>
            <input class="form-control" id="age" name="age" value="18">
        </div>
        <div class="form-group">
            <label for="growth" class="control-label">Возраст</label>
            <input class="form-control" id="growth" name="growth" value="175.6">
        </div>
        <div class="form-group">
            <label for="stack-learn" class="control-label">Что вы изучаете?</label>

            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="html" checked> HTML</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="css" checked> CSS</label>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="stack_learn[]" value="php"> PHP</label>
            </div>
            <div class="checkbox disabled">
                <label><input type="checkbox" name="stack_learn[]" value="mysql" disabled> MySQL</label>
            </div>

        </div>
        <div class="checkbox">
            <label><input type="checkbox" name="is_agree" value="1" checked required> Условия соглашения</label>
        </div>
        <button class="btn btn-primary">Зарегистрироваться</button>
    </form>
</div>

</body>
</html>