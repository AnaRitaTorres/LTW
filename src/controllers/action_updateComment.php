<?php

$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/comments.php');

$id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
$comment = getComment($id);

if($_POST["body"] == null)
  $body = $comment["body"];
else $body = $_POST["body"];

updateCommment($id,$body);

header('Location: /mainPage.php');
?>
