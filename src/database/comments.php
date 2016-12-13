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
    $stmt = $db->prepare('INSERT INTO comments (body) values(?)');
    $stmt->execute(array($body));
    return $db->lastInsertId();
}

function newReply($user_id, $review_id, $comment_id){
    global $db;
    $stmt = $db->prepare('INSERT INTO review_comment (user_id, review_id, comment_id) values(?, ?, ?)');
    $stmt->execute(array($user_id, $review_id, $comment_id));
}

function deleteComment($id){
  global $db;
  $stmt = $db->prepare('DELETE * FROM comments where id = ?');
  $stmt->execute(array($id));
}

function getComment($id){
  global $db;
  $stmt = $db->prepare('SELECT * FROM comments where id = ?');
  $stmt->execute(array($id));
  $result = $stmt->fetch();
  return $result;
}

function updateComment($id,$body){
  global $db;
  $stmt = $db->prepare('UPDATE comments SET body = body where id = ?');
  $stmt->execute(array($id,$body));
}
