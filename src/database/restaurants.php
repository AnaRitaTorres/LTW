<?php

function getRestaurants(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getRestaurant($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();
    return $result;
}