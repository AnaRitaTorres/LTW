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

function deleteComment($id){
  global $db;
  $stmt = $db->prepare('DELETE * FROM comments where id = ?');
  $stmt->execute(array($id));
}

function getCommentLikes($id){
  global $db;
  $stmt = $db->prepare('SELECT likes FROM comments where id = ?');
  $stmt->execute(array($id));
  $result = $stmt->fetchAll();
  return $result;
}

function getCommentDislikes($id){
  global $db;
  $stmt = $db->prepare('SELECT dislikes FROM comments where id = ?');
  $stmt->execute(array($id));
  $result = $stmt->fetchAll();
  return $result;
}

function updateComment($id,$body){
  global $db;
  $stmt = $db->prepare('UPDATE comments SET body = body where id = ?');
  $stmt->execute(array($id,$body));
}
