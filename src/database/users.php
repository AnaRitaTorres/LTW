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

function getUserByName($username){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where username = ?');
    $stmt->execute(array($username));
    $result = $stmt->fetch();
    return $result;
}

function userExists($username, $password){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where username = ? AND password = ?');
    $stmt->execute(array($username, $password));
    $result = $stmt->fetch();
    return $result;
}

function newUser($name, $password, $email){
    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO users (username, first_name, last_name, password, email) values(?, ?, ?, ?, ?)');
    $encryptedPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt->execute(array($name, '', '', $encryptedPass, $email));
}

function deleteUserByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where id = ?');
    $stmt->execute(array($id));
}

function deleteUserByName($username){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where username = ?');
    $stmt->execute(array($username));
}

function deleteUserByEmail($email){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where email = ?');
    $stmt->execute(array($email));
}

function updateUser($id , $password, $firstName, $lastName, $age, $address){
  global $db;
  $stmt = $db->prepare('UPDATE users SET password = ?, first_name = ?, last_name = ?,address = ?, age = ? where id=?');
  $stmt->execute(array($password, $firstName, $lastName, $age, $address, $id));
}
?>
