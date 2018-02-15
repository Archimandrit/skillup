<?php

$db = new PDO ('mysql:host=localhost;dbname=php2;charset=utf8', 'root', 'root');

$result = $db->query('
SELECT * FROM users
WHERE age >= 18
');
$users = $result->fetchAll();

//var_dump($users);
?>
<html>
<head>

</head>
<body>
    <div class="container">
           <table>
               <tr>
                   <th>id</th>
                   <th>name</th>
                   <th>lastname</th>
                   <th>age</th>
               </tr>
               <?php foreach ($users as $user) { ?>
               <tr>
                   <td><?= $user['id'] ?></td>
                   <td><?= $user['firstname']?></td>
                   <td><?= $user['lastname']?></td>
                   <td><?= $user['age']?></td>

               </tr>
                   <?php } ?>
           </table>
    </div>
</body>
</html>