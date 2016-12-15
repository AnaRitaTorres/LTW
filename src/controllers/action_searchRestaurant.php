<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if($_GET['type'] == 'default'){
        $name = trim(strip_tags($_GET['name']));
        $restaurants = searchRestaurant($name);

        usort($restaurants, "cmp");
        echo json_encode($restaurants);
    }else if($_GET['type'] == "category"){
        $category = trim(strip_tags($_GET['name']));
        $restaurants = getRestaurantByCategory($category);
        usort($restaurants, "cmp");
        echo json_encode($restaurants);
    }
}

function cmp($a, $b)
{
    $reviewsA = getRestaurantReviews($a["id"]);
    $avgRatingA = getRestaurantAvgRating($reviewsA);

    $reviewsB = getRestaurantReviews($b["id"]);
    $avgRatingB = getRestaurantAvgRating($reviewsB);

    return $avgRatingA < $avgRatingB;
}