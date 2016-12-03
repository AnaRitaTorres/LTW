<!DOCTYPE html>
<html>
<head>
    <title>RestaurantFinder - Restaurant</title>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="public/css/stylesheet.css">

    <?php
    $db;
    include_once ('controllers/validation.php');
    include_once('database/connection.php');
    include_once('database/restaurants.php');
    $restaurant = getRestaurantByName($_SESSION["name"]);
    ?>
</head>
<body>
<div id="header">
    <img src ="resources/logo1.png" width="150" height="150">
    <h1>RestaurantFinder</h1>
</div>
<div id="content">
    <h2>Edit Restaurant's Account</h2>
    <div class="restaurant">
        <form action="/controllers/action_updateRestaurant.php" method="post">
            <input type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>

            Name: <input type="text" name="name" placeholder="<?php echo $restaurant['name'];?>"/><br>
            Description: <input type="text" name="description" placeholder="<?php echo $restaurant['description'];?>"/><br>
            Category: <input type="text" name="category" placeholder="<?php echo $restaurant['category'];?>"/><br>
            Price: <input type="number" name="price" placeholder="<?php echo $restaurant['price'];?>"/><br>
            Link: <input type="url" name="link" placeholder="<?php echo $restaurant['link'];?>"/><br>
            Address: <input type="text" name="address" placeholder="<?php echo $restaurant['address'];?>"/><br>
            <input type="submit" value="Save">
        </form>
    </div>
</div>
</body>
</html>
