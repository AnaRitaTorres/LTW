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

function isOwner($user_id, $restaurant_id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurant_user where user_id = ? AND restaurant_id = ?');
    $stmt->execute(array($user_id, $restaurant_id));
    $result = $stmt->fetch();
    if($result != null)
        return true;
    else return false;
}

function getRestaurantReviews($restaurant_id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM reviews where restaurant_id = ?');
    $stmt->execute(array($restaurant_id));
    $result = $stmt->fetchAll();
    return $result;
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

function new_restaurant_user($user_id, $restaurant_id){
    global $db;
    $stmt = $db->prepare('INSERT INTO restaurant_user (restaurant_id, user_id) values(?, ?)');
    $stmt->execute(array($restaurant_id, $user_id));
}

function updateRestaurant($id,$description, $link){
  global $db;
  $stmt = $db->prepare('UPDATE restaurants SET description = ?, link = ? where id =?');
  $stmt->execute(array($description,$link,$id));
}
?>
