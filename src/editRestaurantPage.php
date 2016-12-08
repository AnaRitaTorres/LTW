<?php
$db;
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/restaurants.php');
$restaurant = getRestaurantByName($_SESSION["name"]);

include('resources/templates/header.php');
?>

    <div id="content">
        <h2>Edit Restaurant's Account</h2>
        <div class="restaurant">
            <form action="/controllers/action_updateRestaurant.php" method="post">
                <input type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>
                <label>
                    Name: <input type="text" name="name" placeholder="<?php echo $restaurant['name'];?>"/>
                </label>
                <br>
                <label>
                    Description: <input type="text" name="description" placeholder="<?php echo $restaurant['description'];?>"/>
                </label>
                <br>
                <label>
                    Category: <input type="text" name="category" placeholder="<?php echo $restaurant['category'];?>"/>
                </label>
                <br>
                <label>
                    Price: <input type="number" name="price" placeholder="<?php echo $restaurant['price'];?>"/>
                </label>
                <br>
                <label>
                    Link: <input type="url" name="link" placeholder="<?php echo $restaurant['link'];?>"/>
                </label>
                <br>
                <label>
                    Address: <input type="text" name="address" placeholder="<?php echo $restaurant['address'];?>"/>
                </label>
                <br>
                <input type="submit" value="Save">
            </form>
        </div>
    </div>
<?
include('resources/templates/footer.php');
?>