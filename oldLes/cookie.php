<?php

$countView=1;
if (!empty($_COOKIE['count_view'])) {
    $countView = $_COOKIE['count_view'];
    var_dump($countView);
    setcookie('count_view', $countView++, time()+3600);
} else {
    setcookie('count_view', $countView, time()+3600);

}
var_dump($_COOKIE['count_view']);
echo 'Test cookie count:' . $countView;
