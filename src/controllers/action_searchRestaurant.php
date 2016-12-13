<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $name = trim(strip_tags($_GET['name']));
    $restaurants = searchRestaurant($name);

    usort($restaurants, "cmp");
    echo json_encode($restaurants);
}

function cmp($a, $b)
{
    $reviewsA = getRestaurantReviews($a["id"]);
    $ratingSumA = sumReviewsRatings($reviewsA);
    $reviewsCountA = count($reviewsA);
    if($reviewsCountA == 0){
        $avgRatingA = 0;
    } else $avgRatingA = $ratingSumA/$reviewsCountA;

    $reviewsB = getRestaurantReviews($b["id"]);
    $ratingSumB = sumReviewsRatings($reviewsB);
    $reviewsCountB = count($reviewsB);
    if($reviewsCountB == 0){
        $avgRatingB = 0;
    } else $avgRatingB = $ratingSumB/$reviewsCountB;

    return $avgRatingA < $avgRatingB;
}

function sumReviewsRatings($reviews){
    $sum = 0;
    foreach ($reviews as $review){
        $sum += $review["score"];
    }
    return $sum;
}