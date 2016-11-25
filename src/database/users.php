<?php

function getUsers(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function getUser($id){
    global $db;
    $stmt = $db->prepare('SELECT * FROM users where id = ?');
    $stmt->execute(array($id));
    $result = $stmt->fetchAll();
    return $result;
}