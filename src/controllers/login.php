<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

// clear out any existing session that may exist
session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim(strip_tags($_POST["username"]));
    $password = $_POST["password"];

    if (userExists($username, $password)) {
        session_start();
        $_SESSION["authenticated"] = 'true';
        $_SESSION["username"] = $username;
        header('Location: /mainPage.php');
    } else {
        echo "Invalid username or password";
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = null;
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

}
