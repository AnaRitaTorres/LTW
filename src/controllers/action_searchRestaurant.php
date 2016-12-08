<?php

$name = $_GET['name'];

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

$restaurants = searchRestaurant($name);

// JSON encode them
echo json_encode($restaurants);