<?php

function getAllReviews(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM reviews');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function newReview($title, $score, $body, $user_id, $restaurant_id){
    global $db;
    $date = (new \DateTime())->format('Y-m-d H:i:s');
    $stmt = $db->prepare('INSERT INTO reviews (title, user_id, restaurant_id, score, body, date, likes, dislikes) values(?, ?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($title, $user_id, $restaurant_id, $score, $body, $date, 0, 0));
    return $db->lastInsertId();
}

function deleteReview($id){
  global $db;
  $stmt = $db->prepare('DELETE * FROM reviews where id = ?');
  $stmt->execute(array($id));
}

function getReview($id){
  global $db;
  $stmt = $db->prepare('SELECT * FROM reviews where id = ?');
  $stmt->execute(array($id));
  $result = $stmt->fetch();
  return $result;
}

function updateReview($id,$score,$body){
  global $db;
  $stmt = $db->prepare('UPDATE reviews SET score = score, body = body where id = ?');
  $stmt->execute(array($id,$score,$body));
}

function getNrReviews($user_id, $restaurant_id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM reviews where user_id = ? AND restaurant_id = ?');
    $stmt->execute(array($user_id, $restaurant_id));
    $result = $stmt->fetchAll();
    return count($result);
}

