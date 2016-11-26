<?php

function getUsers(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getUserByID($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return $result;
}

function getUserByName($name){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where first_name = ?');
    $stmt->execute(array($name));
    $result = $stmt->fetch();
    return $result;
}

function userExists($name, $password){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where first_name = ? AND password = ?');
    $stmt->execute(array($name, $password));
    $result = $stmt->fetch();
    return $result;
}

function newUser($name, $password, $email){
    global $db;
    $stmt = $db->prepare("INSERT INTO users (first_name, password, email) values('$name', '$password', '$email')");
    $stmt->execute();
}