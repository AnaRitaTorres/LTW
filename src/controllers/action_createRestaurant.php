<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $user = getUserByName($_SESSION['username']);
    newRestaurant($_POST["name"], $_POST["description"], $_POST["category"], $_POST["location"]);
    $restaurant = getRestaurantByName($_POST["name"]);
    new_restaurant_user($user["id"], $restaurant["id"]);
}
