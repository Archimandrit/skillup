<?php
$db = new PDO ('mysql:host=localhost;dbname=database123;charset=utf8', 'mysql', 'mysql');

$result = $db->query('
SELECT * FROM users WHERE login
');
$users = $result->fetchAll();

echo $users['login'];
?>

<html>
<head>

</head>
<body>
<div class="container">
    <table>
        <tr>
            <th>login</th>
            <th>password</th>
            <th>email</th>
        </tr>
        <?php foreach ($users as $user) { ?>
            <tr>
                <td><?= $user['login'] ?></td>
                <td><?= $user['password']?></td>
                <td><?= $user['email']?></td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
