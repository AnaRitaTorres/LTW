<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/reviews.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$review = getReview($id);

if($_POST["body"] == null)
  $body = $review["body"];
else $body = $_POST["body"];

if($_POST["score"] == null)
  $score = $review["score"];
else $score = $_POST["score"];

updateReview($id,$score,$body);

header('Location: /mainPage.php');
?>
