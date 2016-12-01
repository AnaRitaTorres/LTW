<?php

function getAllRestaurants(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getUserRestaurants($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurant_user where user_id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();

    $restaurants = [];
    foreach ($result as $row){
        array_push($restaurants, getRestaurantByID($row["restaurant_id"]));
    }

    return $restaurants;
}

function getRestaurantByID($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result;
}

function getRestaurantByName($name){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants where name = ?');
    $stmt->execute(array($name));
    $result = $stmt->fetch();
    return $result;
}

function deleteRestaurantByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM restaurants where id = ?');
    $stmt->execute(array($id));
}

function deleteRestaurantByName($name){
    global $db;
    $stmt = $db->prepare('DELETE * FROM restaurants where name = ?');
    $stmt->execute(array($name));
}

function newRestaurant($name, $description, $category){
    global $db;
    $stmt = $db->prepare('INSERT INTO restaurants (name, description, category) values(?, ?, ?)');
    $stmt->execute(array($name, $description, $category));
}

function updateRestaurant($id,$description, $link){
  global $db;
  $stmt = $db->prepare('UPDATE restaurants SET description = ?, link = ? where id =?');
  $stmt->execute(array($description,$link,$id));
}
?>
