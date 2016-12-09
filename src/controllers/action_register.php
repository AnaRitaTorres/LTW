<?php

$username = null;
$password = null;

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

// clear out any existing session that may exist
session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = $_POST["firstName"];
    $lastName= $_POST["lastName"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if (!userExists($username, $password)) {
        newUser($username, $password, $email);
        session_start();
        $_SESSION["authenticated"] = 'true';
        $_SESSION["username"] = $username;
        header('Location: /mainPage.php');
    } else {
        $_SESSION['flash_error'] = "Invalid Username or Password";
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = null;
    }
}
