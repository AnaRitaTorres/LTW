<?php
    global $db;
    $db = new PDO('sqlite:../database/restaurants.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);