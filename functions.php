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
