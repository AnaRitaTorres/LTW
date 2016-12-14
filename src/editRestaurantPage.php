<?php
$db;
include('resources/templates/header.php');
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/restaurants.php');
include_once('database/users.php');
include_once('database/images.php');
$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
$isOwner = isOwner($user["id"], $restaurant["id"]);
$images = getRestaurantImages($restaurant["id"]);

if(!$isOwner)
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

    <div id="content">
        <h2>Edit <?php echo $restaurant['name'];?></h2>

        <?php if(count($images) < 8):?>
        <div class="upload">
            <form action="/controllers/upload.php" method="post" enctype="multipart/form-data" id="imageForm">
                <input id="restaurant_id" type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>
                <label>Title:
                    <input type="text" name="title" id="title" required>
                </label>
                <input type="file" name="image" id="image" required>
                <input type="submit" value="Upload">
            </form>
        </div>
        <?php endif;?>

        <div class="restaurant">
            <form action="/controllers/action_updateRestaurant.php" method="post">
                <input type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>
                <label>Name:
                    <input type="text" name="name" required id="name" maxlength="50" value="<?php echo $restaurant['name'];?>">
                </label>
                <br>
                <label>Category:
                    <select name="category" id="category">
                        <option value="Seafood">Seafood</option>
                        <option value="Italian">Italian</option>
                        <option value="Asian">Asian</option>
                        <option value="Bakery">Bakery</option>
                        <option value="Barbecue">Barbecue</option>
                        <option value="Pizzeria">Pizzeria</option>
                        <option value="Steak House">Steak House</option>
                        <option value="Vegetarian">Vegetarian</option>
                        <option value="Fast Food">Fast Food</option>
                    </select>
                </label>
                <br>
                <label>Average Price:
                    <input type="number" name="price" id="price" min="1" step="0.1" value="<?php echo $restaurant['price'];?>">
                </label>
                <br>
                <label>Website:
                    <input type="url" name="url" id="url" value="<?php echo $restaurant['website'];?>">
                </label>
                <br>
                <label>Description:<br>
                    <textarea rows="5" cols="90" name="description" id="description"  maxlength="255"><?php echo $restaurant['description'];?></textarea>
                </label>
                <br>
                <button type="submit"class="savebtn">Save</button>
            </form>
        </div>
    </div>

    <button onclick="location.href='/restaurant.php?id=<?php echo $restaurant['id'];?>'" class="backbtn">Back</button>
<?
include('resources/templates/footer.php');
?>