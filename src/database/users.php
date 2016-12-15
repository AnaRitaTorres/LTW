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
    $stmt = $db->prepare('SELECT * FROM users where username = ?');
    $stmt->execute(array($username));
    $result = $stmt->fetch();
    return ($result !== false && password_verify($password, $result['password']));
}

function usernameExists($username){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where username = ?');
    $stmt->execute(array($username));
    $result = $stmt->fetch();
    return ($result !== false);
}

function passwordMatch($id, $password){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetch();
    return (password_verify($password, $result['password']));
}

function emailInUse($email){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where email = ?');
    $stmt->execute(array($email));
    $result = $stmt->fetch();
    return ($result !== false);
}

function newUser($name, $password, $email, $firstName, $lastName, $gender){
    global $db;
    $options = ['cost' => 12];
    $stmt = $db->prepare('INSERT INTO users (username, first_name, last_name, password, email, gender) values(?, ?, ?, ?, ?, ?)');
    $encryptedPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt->execute(array($name, $firstName, $lastName, $encryptedPass, $email, $gender));
}

function newProfilePic($user_id, $picName){
    global $db;
    $stmt = $db->prepare('UPDATE users SET profilePic = ? where id=?');
    $stmt->execute(array($picName, $user_id));
}

function deleteUserByID($id){
    global $db;
    $stmt = $db->prepare('DELETE * FROM users where id = ?');
    $stmt->execute(array($id));
}

function updateUser($id , $password, $firstName, $lastName, $age){
    global $db;
    $options = ['cost' => 12];
    $encryptedPass = password_hash($password, PASSWORD_DEFAULT, $options);
    $stmt = $db->prepare('UPDATE users SET password = ?, first_name = ?, last_name = ?, age = ? where id=?');
    $stmt->execute(array($encryptedPass, $firstName, $lastName, $age, $id));
}


function searchUsers($name){
    global $db;
    $stmt = $db->prepare("SELECT * FROM users WHERE upper(username) LIKE upper(?) LIMIT 10");
    $stmt->execute(array("$name%"));
    return $stmt->fetchAll();
}
