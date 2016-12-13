<?php

function getAllImages(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM images');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getImageByID($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM images where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result;
}

function deleteImageByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM images where id = ?');
    $stmt->execute(array($id));
}

function newImage($title, $restaurant_id, $extension)
{
    global $db;
    $stmt = $db->prepare('INSERT INTO images (title, restaurant_id, extension) values(?, ?, ?)');
    $stmt->execute(array($title, $restaurant_id, $extension));
}

function getRestaurantImages($restaurant_id)
{
    global $db;
    $stmt = $db->prepare('SELECT * FROM images WHERE restaurant_id = ?');
    $stmt->execute(array($restaurant_id));
    return $stmt->fetchAll();
}