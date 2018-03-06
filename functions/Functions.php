<?php

function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=database123;charset=utf8', 'mysql', 'mysql');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
}
?>