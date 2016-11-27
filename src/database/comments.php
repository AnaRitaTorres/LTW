<?php

function getAllComments(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM comments');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function newComment($body){
    global $db;
    $stmt = $db->prepare('INSERT INTO comments (body, likes, dislikes) values(?, ?, ?)');
    $stmt->execute(array($body, 0, 0));
}