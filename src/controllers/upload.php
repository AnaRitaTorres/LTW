<?php
$db;
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/connection.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/restaurants.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/database/images.php');

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
    $restaurant_id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $restaurant = getRestaurantByID($restaurant_id);
    newImage($_POST["title"], $restaurant_id, $imageFileType);
    $id = $db->lastInsertId();

    $originalFileName = "../public/img/originals/$id." . $imageFileType;
    $smallFileName = "../public/img/thumbs_small/$id." . $imageFileType;
    $mediumFileName = "../public/img/thumbs_medium/$id." . $imageFileType;

    move_uploaded_file($_FILES['image']['tmp_name'], $originalFileName);

    $original = imagecreatefromstring(file_get_contents($originalFileName));

    $width = imagesx($original);
    $height = imagesy($original);
    $square = min($width, $height);

// Create small square thumbnail
    $small = imagecreatetruecolor(200, 200);
    imagecopyresized($small, $original, 0, 0, ($width>$square)?($width-$square)/2:0, ($height>$square)?($height-$square)/2:0, 200, 200, $square, $square);
    imagejpeg($small, $smallFileName);

    $mediumwidth = $width;
    $mediumheight = $height;

    if ($mediumwidth > 400) {
        $mediumwidth = 400;
        $mediumheight = $mediumheight * ( $mediumwidth / $width );
    }

    $medium = imagecreatetruecolor($mediumwidth, $mediumheight);
    imagecopyresized($medium, $original, 0, 0, 0, 0, $mediumwidth, $mediumheight, $width, $height);
    imagejpeg($medium, $mediumFileName);

    $path = '../restaurant.php?id=' . $restaurant_id;

    header("Location: " . $path);
}
