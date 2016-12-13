<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/reviews.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/replies.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    session_start();
    $user = getUserByID($_POST["user_id"]);
    $review = getReview($_POST["review_id"]);
    $reply_id = newReply($_POST["body"], $user["id"], $review["id"]);
    $reply = getReply($reply_id);
    echo json_encode([$reply, $review, $user]);
}