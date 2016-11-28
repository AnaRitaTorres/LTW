<?php
    global $db;
    $path = $_SERVER['DOCUMENT_ROOT'];
    $path .= "/database/restaurants.db";
    $db = new PDO("sqlite:$path", $path);
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
