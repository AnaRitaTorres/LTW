<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = trim(strip_tags($_GET['name']));
    $users = searchUsers($name);

    echo json_encode($users);
}
