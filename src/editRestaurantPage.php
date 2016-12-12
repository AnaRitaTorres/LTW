<?php
$db;
include('resources/templates/header.php');
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/restaurants.php');
include_once('database/users.php');
$restaurant = getRestaurantByName($_SESSION["name"]);
$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
$isOwner = isOwner($user["id"], $restaurant["id"]);

if(!$isOwner)
    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

    <div id="content">
        <h2>Edit <?php echo $restaurant['name'];?></h2>
        <div class="restaurant">
            <form action="/controllers/action_updateRestaurant.php" method="post">
                <input type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>
                <label>Name:
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
                    Price: <input type="number" name="price" placeholder="<?php echo $restaurant['price'];?>" min="0"/>
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
                <button type="submit"class="savebtn">Save</button>
            </form>
        </div>

        <form action="/controllers/upload.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $restaurant['id'];?>"/>
            <label>Title:
                <input type="text" name="title">
            </label>
            <input type="file" name="image" id="image">
            <input type="submit" value="Upload">
        </form>
    </div>
<?
include('resources/templates/footer.php');
?>