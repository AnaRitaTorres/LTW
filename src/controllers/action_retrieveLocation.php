<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

$id = $_REQUEST['id'];
$restaurants = getRestaurantByID($id);

echo $restaurants["location_id"];