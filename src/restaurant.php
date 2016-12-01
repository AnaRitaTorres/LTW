<?php
include('controllers/validation.php');
include('resources/templates/header.php');
$db;
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
?>

    <h3>Restaurant <?echo $restaurant["name"];?> </h3>


<?
include('resources/templates/footer.php');
?>