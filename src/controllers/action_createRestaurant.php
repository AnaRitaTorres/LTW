<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = trim(strip_tags($_POST["name"]));
    $description  = trim(strip_tags($_POST["description"]));
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $website = trim(strip_tags($_POST["website"]));
    $inauguration = $_POST["inauguration"];
    $category = $_POST["category"];
    $location = $_POST["location"];

    session_start();
    $user = getUserByName($_SESSION['username']);
    $id = newRestaurant($name, $description, $price, $website, $inauguration, $category, $location);
    new_restaurant_user($user["id"], $id);
}
