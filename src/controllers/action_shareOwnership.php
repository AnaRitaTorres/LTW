<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'restaurant_id', FILTER_VALIDATE_INT);
    $restaurant = getRestaurantByID($id);

    $username = trim(strip_tags($_POST["username"]));
    if(!usernameExists($username)){
        echo "User does not exists!";
        return;
    }

    $user = getUserByName($username);

    if(isOwner($user["id"], $restaurant["id"])){
        echo "The user is already owner!";
        return;
    }

    new_restaurant_user($user["id"], $restaurant["id"]);
    echo "Successful share of ownership!";
}
