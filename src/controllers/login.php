<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim(strip_tags($_POST["username"]));
    $password = $_POST["password"];

    if (userExists($username, $password)) {
        session_start();
        $_SESSION["authenticated"] = 'true';
        $_SESSION["username"] = $username;
    } else {
        if(usernameExists($username)){
            echo "Wrong password!";
        } else echo "Invalid username!";
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = null;
    }

}
