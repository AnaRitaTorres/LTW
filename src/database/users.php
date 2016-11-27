<?php

function getAllUsers(){
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

function getUserByName($firstName,$lastName){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where first_name = ? AND last_name = ?');
    $stmt->execute(array($firstName,$lastName));
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
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO users (first_name, last_name, password, email) values(?, ?, ?, ?)');
    $afas = password_hash($password, PASSWORD_DEFAULT, $options);
    echo $afas;
    $stmt->execute(array($name, '', $afas, $email));
}

function deleteUserByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where id = ?');
    $stmt->execute(array($id));
}

function deleteUserByName($firstName,$lastNam){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where first_name = ? AND last_name = ?');
    $stmt->execute(array($firstName,$lastName));
}

function deleteUserByEmail($email){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where email = ?');
    $stmt->execute(array($email));
}

function updateUser($id,$password, $email,$adress){
  global $db;
  $stmt = $db->prepare('UPDATE users SET password = password, email = email, adress = adress where id=?');
  $stmt->execute(array($name, $password, $email,$adress));

}
