<?php

$username = null;
$password = null;

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/controllers/users.php');

// clear out any existing session that may exist
session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (!empty($_POST["name"]) && !empty($_POST["password"])) {
        $username = $_POST["name"];
        $password = $_POST["password"];
        $passwordRepeat = $_POST["password2"];
        $email = $_POST["email"];

        if($password != $passwordRepeat)
            header('Location: /registrationPage.php');

        if (!userExists($username, $password)) {
            newUser($username, $password, $email);
            session_start();
            $_SESSION["authenticated"] = 'true';
            $_SESSION["username"] = $username;
            header('Location: /mainPage.php');
        } else {
            $_SESSION['flash_error'] = "Invalid username or password";
            $_SESSION['authenticated'] = false;
            $_SESSION['username'] = null;
            header('Location: /registrationPage.php');
        }
    }else {
        header('Location: /registrationPage.php');
    }
}