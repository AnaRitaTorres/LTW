<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/reviews.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $user = getUserByName($_SESSION['username']);
    $restaurant = getRestaurantByID($_POST["restaurant_id"]);
    newReview($_POST["rating"], $_POST["body"], $user["id"], $restaurant["id"]);
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}