<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$restaurant = getRestaurantByID($id);

if($_POST["description"] == null)
  $description = $restaurant["description"];
else $description = $_POST["description"];

if($_POST["link"] == null)
  $link = $restaurant["link"];
else $link = $_POST["link"];

updateRestaurant($id, $description, $link);

$path = '../restaurant.php?id=' . $id;

header("Location: " . $path);
