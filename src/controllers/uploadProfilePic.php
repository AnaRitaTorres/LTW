<?php
$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/users.php');

$uploadOk = 1;
$imageFileType = pathinfo(basename($_FILES["image"]["name"]),PATHINFO_EXTENSION);

if ($_FILES["image"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, only JPG, JPEG & PNG files are allowed.";
    $uploadOk = 0;
    header("Location: " . $_SERVER['HTTP_REFERER']);
}

if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
} else {
    $user_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $user = getUserByID($user_id);
    $picName = "../public/img/originals/" . $user["username"] . '.' . $imageFileType;
    newProfilePic($user_id, $picName);

    move_uploaded_file($_FILES['image']['tmp_name'], $picName);

    $path = '../profilePage.php?username=' . $user["username"];
    header("Location: " . $path);
}