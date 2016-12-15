<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $restaurant = getRestaurantByID($id);

    $name = trim(strip_tags($_POST["name"]));
    $description = trim(strip_tags($_POST["description"]));
    $website = rawurlencode(trim(strip_tags($_POST["url"])));
    $price = filter_input(INPUT_POST, 'price', FILTER_VALIDATE_FLOAT);
    $category = $_POST["category"];

    updateRestaurant($id, $name, $description, $website, $price, $category);

    $path = '../restaurant.php?id=' . $id;

    header("Location: " . $path);
}
