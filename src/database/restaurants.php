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

function getRestaurantAvgRating($reviews){
    $sum = 0;
    foreach ($reviews as $review){
        $sum += $review["score"];
    }

    $reviewsCount = count($reviews);
    if($reviewsCount == 0){
        $avgRating = 0;
    } else $avgRating = $sum/$reviewsCount;
    return $avgRating;
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

function getOwners($restaurant_id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurant_user where restaurant_id = ?');
    $stmt->execute(array($restaurant_id));
    $result = $stmt->fetchAll();

    $users = [];
    foreach ($result as $row){
        array_push($users, getUserByID($row["user_id"]));
    }
    return $users;
}

function getRestaurantByID($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM restaurants where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result;
}

function getRestaurantName($id){
    global $db;
    $stmt = $db->prepare('SELECT name FROM restaurants where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result["name"];
}

function deleteRestaurantByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM restaurants where id = ?');
    $stmt->execute(array($id));
}

function newRestaurant($name, $description, $price, $website, $inauguration, $category, $location){
    global $db;
    $stmt = $db->prepare('INSERT INTO restaurants (name, description, price, website, inauguration, category, location_id) values(?, ?, ?, ?, ?, ?, ?)');
    $stmt->execute(array($name, $description, $price, $website, $inauguration, $category, $location));
    return $db->lastInsertId();
}

function new_restaurant_user($user_id, $restaurant_id){
    global $db;
    $stmt = $db->prepare('INSERT INTO restaurant_user (restaurant_id, user_id) values(?, ?)');
    $stmt->execute(array($restaurant_id, $user_id));
}

function updateRestaurant($id, $name, $description, $website, $price, $category){
  global $db;
  $stmt = $db->prepare('UPDATE restaurants SET name=?, description = ?, website = ?, price=?, category=? where id =?');
  $stmt->execute(array($name, $description, $website, $price, $category, $id));
}

function searchRestaurant($name){
    global $db;
    $stmt = $db->prepare("SELECT * FROM restaurants WHERE upper(name) LIKE upper(?) LIMIT 10");
    $stmt->execute(array("%$name%"));
    return $stmt->fetchAll();
}

function getRestaurantByCategory($category){
    global $db;
    $stmt = $db->prepare("SELECT * FROM restaurants WHERE upper(category) LIKE upper(?) LIMIT 10");
    $stmt->execute(array("$category%"));
    return $stmt->fetchAll();
}