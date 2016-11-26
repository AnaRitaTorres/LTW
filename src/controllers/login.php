<?php

$username = null;
$password = null;

$db;
include_once($_SERVER['DOCUMENT_ROOT'].'/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'].'/controllers/users.php');

// clear out any existing session that may exist
session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["name"]) && !empty($_POST["password"]) && !empty($_POST["email"])) {
        $username = $_POST["name"];
        $password = $_POST["password"];
        $email = $_POST["email"];

        if (userExists($username, $password, $email)) {
            session_start();
            $_SESSION["authenticated"] = 'true';
            $_SESSION["username"] = $username;
            header('Location: /views/mainPage.php');
        } else {
            $_SESSION['flash_error'] = "Invalid username or password";
            $_SESSION['authenticated'] = false;
            $_SESSION['username'] = null;
            header('Location: /views/userAuthPage.php');
        }
    }else {
        header('Location: /views/userAuthPage.php');
    }
}