<?php

function getAllReviews(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM reviews');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function newReview($score, $body, $user_id, $restaurant_id){
    global $db;
    $date = (new \DateTime())->format('Y-m-d H:i:s');
    $stmt = $db->prepare('INSERT INTO reviews (user_id, restaurant_id, score, body, date, likes, dislikes) values(?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($user_id, $restaurant_id, $score, $body, $date, 0, 0));
}