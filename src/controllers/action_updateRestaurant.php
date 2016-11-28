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
  $description = $restaurant["link"];
else $description = $_POST["link"];

updateRestaurant($id,$description,$link);

header('Location: /mainPage.php');
?>
