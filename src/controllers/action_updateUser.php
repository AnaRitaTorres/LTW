<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $user = getUserByID($id);

    if ($_POST["firstName"] == null)
        $first_name = $user["first_name"];
    else{
        $first_name = trim(strip_tags($_POST["firstName"]));
        if ( !preg_match ("/^[a-zA-Z\s]+$/", $first_name)) {
            echo "Invalid first name!";
            return;
        }
    }

    if ($_POST["lastName"] == null)
        $last_name = $user["last_name"];
    else {
        $last_name = trim(strip_tags($_POST["lastName"]));
        if ( !preg_match ("/^[a-zA-Z\s]+$/", $last_name)) {
            echo "Invalid last name!";
            return;
        }
    }

    if ($_POST["age"] == null)
        $age = $user["age"];
    else {
        $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    }

    if ($_POST["newPass"] == null) {
        $password = $_POST["oldPass"];
    } else {
        $password = $_POST["newPass"];
    }

    if (!userExists($user["username"], $password)) {
        echo "Wrong password!";
        return;
    }

    updateUser($id, $password, $first_name, $last_name, $age);
}
