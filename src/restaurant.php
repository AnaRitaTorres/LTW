<?php
include('controllers/validation.php');
include('resources/templates/header.php');
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

    <div class="review">
        <form action="/controllers/action_addReview.php" method="post">
            <input type="hidden" name="restaurant_id" value="<?php echo $restaurant["id"];?>">
            <label>Title:
                <input type="text" name="title" required>
            </label><br>
            <label>Rating:
                <input type="number" name="rating" required>/10
            </label><br>
            <label>Body:
                <textarea rows="10" cols="100" name="body" required>
                </textarea>
            </label><br>
            <input type="submit" value="Save">
        </form>
    </div>

<?
include('resources/templates/footer.php');
?>