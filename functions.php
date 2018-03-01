<?php
function addAlertDanger($message) {
    $GLOBALS['alerts'][] = [
        'type' => 'danger',
        'message' => $message,
    ];
}

function addAlertSuccess($message) {
    $GLOBALS['alerts'][]= [
        'type' => 'success',
        'message' => $message,
    ];
}
function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=database123;charset=utf8', 'mysql', 'mysql');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
