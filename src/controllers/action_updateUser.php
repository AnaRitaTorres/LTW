<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$user = getUserByID($id);

if($_POST["first_name"] == null)
    $first_name = $user["first_name"];
else $first_name = $_POST["first_name"];

if($_POST["last_name"] == null)
    $last_name = $user["last_name"];
else $last_name = $_POST["last_name"];

if($_POST["address"] == null)
    $address = $user["address"];
else $address = $_POST["address"];

if($_POST["age"] == null)
    $age = $user["age"];
else{
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
}

updateUser($id, $_POST["password"], $first_name, $last_name, $age, $address);

header('Location: /mainPage.php');