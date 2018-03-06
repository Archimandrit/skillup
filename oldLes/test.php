<?php

//Строка
$string = 'some text';
var_dump((int)$string);

//число
$integer = 'some text';
var_dump((bool)$integer);


//Число с плавающей точкой
$float = 16.5;
var_dump($float);

//Булевое значение
$bool = true;
var_dump($bool);

$null=null;
var_dump($null);
//Массив
$array = [
    'red',
    'green',
    'blue',
    'yellow',
    'new_color' => [
    'black',
    'orange',
        ]
];
$array ['new_color'] = [
    '1',
];
var_dump($array);


//Ассоиативный массив
$user = [
    'name' => 'Vasya',
    'age' => 18,
    'height' => 172.11,
    'smoking' => false,
    'rate' => [
        'rate' => 3,
        'teacher' => 'Ivanova 0',
    ],
    ['rate' => 2,
    'teacher' => 'Ivanova 2',
    ]
        ];
$user['rate'][] =[
    'rate' => 5,
    'teacher' => 'Ivanova 1',
];

var_dump($user);
var_dump(count($user['rate']));
var_dump(count($user));

?>
