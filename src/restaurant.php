<?php
$db;
include('controllers/validation.php');
include('resources/templates/header.php');
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
include('database/images.php');

$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
$isOwner = isOwner($user["id"], $restaurant["id"]);
$reviews = getRestaurantReviews($restaurant["id"]);
$images = getRestaurantImages($restaurant["id"]);
?>
    <div style="padding:20px;">

        <?php if($isOwner):?>
            <input type="button" onclick="location.href='<?= '/editRestaurantPage.php?id=' . $restaurant['id'] ?>';" value="Edit Restaurant" />
        <?php endif;?>

        <h2>Restaurant <?php echo $restaurant["name"]; ?></h2>
        <?php echo $restaurant["description"]; ?>
    </div>

    <section id="images">
        <?php foreach ($images as $image) { ?>
            <article class="image">
                <header><h2><?=$image['title']?></h2></header>
                <img src="public/img/thumbs_small/<?=$image['id']?>.jpg" width="200" height="200">
            </article>
        <?php } ?>
    </section>

    <div id="reviews">
        <h4>Reviews</h4>
        <ul>
            <?php foreach ($reviews as $row): ?>
                <p><?php echo $row["body"]; ?></p>
            <?php endforeach; ?>
        </ul>
    </div>

    <?php if(!$isOwner):?>
    <div id="content">
        <form action="/controllers/action_addReview.php" method="post">
            <input type="hidden" name="restaurant_id" value="<?php echo $restaurant["id"];?>">
            <label>Title:
                <input type="text" name="title" required>
            </label><br>
            <label>Rating:
                <input type="number" name="rating" required min="0" max="10">/10
            </label><br>
            <label>Body:
                <textarea rows="10" cols="100" name="body" required>
                </textarea>
            </label><br>
            <input type="submit" value="Save">
        </form>
    </div>
    <?php endif;?>

    <input type="button" onclick="location.href='/restaurantsPage.php'" value="Back" />

<?
include('resources/templates/footer.php');
?>