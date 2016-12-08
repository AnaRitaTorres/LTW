<?php
include('controllers/validation.php');
include('templates/header.php');
$db;
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
$isOwner = isOwner($user["id"], $restaurant["id"]);
$reviews = getRestaurantReviews($restaurant["id"]);
?>
    <div style="padding:20px;">

        <?php if($isOwner):?>
            <input type="button" onclick="location.href='<?= '/editRestaurantPage.php?id=' . $restaurant['id'] ?>';" value="Edit Restaurant" />
        <?php endif;?>

        <h2>Restaurant <?php echo $restaurant["name"]; ?></h2>
        <?php echo $restaurant["description"]; ?>
    </div>

    <h4>Reviews</h4>

    <div style="padding:20px;">
        <ul>
            <?php foreach ($reviews as $row): ?>
                <p><?php echo $row["body"]; ?></p>
            <?php endforeach; ?>
        </ul>
    </div>

<?
include('templates/footer.php');
?>