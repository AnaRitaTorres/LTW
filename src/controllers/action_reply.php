<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/reviews.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/comments.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $user = getUserByID($_POST["user_id"]);
    $review = getReview($_POST["review_id"]);
    $comment_id = newComment($_POST["body"]);
    $comment = getComment($comment_id);
    newReply($user["id"], $review["id"], $comment_id);
    echo json_encode([$comment, $review, $user]);
}