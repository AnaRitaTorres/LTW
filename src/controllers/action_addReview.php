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
    $id = newReview($_POST["title"], $_POST["rating"], $_POST["body"], $user["id"], $restaurant["id"]);
    echo json_encode([getReview($id), $user]);
}