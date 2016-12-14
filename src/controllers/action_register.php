<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

session_start();
session_destroy();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $firstName = trim(strip_tags($_POST["firstName"]));
    $lastName= trim(strip_tags($_POST["lastName"]));
    $username = trim(strip_tags($_POST["username"]));
    $gender = $_POST["gender"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    if (usernameExists($username)) {
        echo "Invalid Username!";
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = null;
    } else if(emailInUse($email)){
        echo "Email address already in use!";
        $_SESSION['authenticated'] = false;
        $_SESSION['username'] = null;
    } else{
        newUser($username, $password, $email, $firstName, $lastName);
        session_start();
        $_SESSION["authenticated"] = 'true';
        $_SESSION["username"] = $username;
    }
}
