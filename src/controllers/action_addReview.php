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
    $id = newReview(validate($_POST["title"]), $_POST["rating"], validate($_POST["body"]), $user["id"], $restaurant["id"]);
    $reviews = getRestaurantReviews($restaurant["id"]);
    $usersCount = count($reviews);
    $avgRating = getRestaurantAvgRating($reviews);
    echo json_encode([getReview($id), $user, $usersCount, $avgRating]);
}

function validate($value){
    return trim(strip_tags($value));
}