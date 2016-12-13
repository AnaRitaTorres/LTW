<?php

function getAllReplies(){
    global $db;
    $stmt = $db->prepare('SELECT * FROM replies');
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}

function newReply($body, $user_id, $review_id){
    global $db;
    $date = (new \DateTime())->format('Y-m-d H:i:s');
    $stmt = $db->prepare('INSERT INTO replies (body, date, user_id, review_id) values(?, ?, ?, ?)');
    $stmt->execute(array($body, $date, $user_id, $review_id));
    return $db->lastInsertId();
}

function deleteReply($id){
  global $db;
  $stmt = $db->prepare('DELETE * FROM replies where id = ?');
  $stmt->execute(array($id));
}

function getReply($id){
  global $db;
  $stmt = $db->prepare('SELECT * FROM replies where id = ?');
  $stmt->execute(array($id));
  $result = $stmt->fetch();
  return $result;
}

function updateReply($id,$body){
  global $db;
  $stmt = $db->prepare('UPDATE replies SET body = body where id = ?');
  $stmt->execute(array($id,$body));
}

function checkReplies($replies, $user_id){
    foreach ($replies as $reply){
        if($reply["user_id"] == $user_id)
            return true;
    }
    return false;
}
