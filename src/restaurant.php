<?php
$db;
include('resources/templates/header.php');
include('controllers/validation.php');
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

    <h3>Location</h3>
    <div id="location"></div>
    <input type="hidden" name="restaurantId" id="restaurantId" value="<?php echo $restaurant["id"];?>">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3ef8eoV1JXRWq-OG3kSxr4uQyfiKKps&callback=showMap&libraries=places"></script>

    <ol class="commentList">
        <h4>Reviews</h4>
        <li class="comment" id="comment">
            <?php foreach ($reviews as $review):?>
                <div class="comment-body" id="comment<?$review['id']?>">
                    <div class="comment-author">
                        <cite class="fn"><?php $author = getUserByID($review['user_id']); echo $author["username"]?></cite>
                        <span class="says">says:</span>
                    </div>
                    <p><?php echo $review['body']?></p>
                    <div class="commentData">
                        <a><?php echo $review['date']?></a>
                    </div>
                    <div class="reply">
                        <a rel="nofollow" class="comment-reply-link" href="/bigurlagain" onclick="javascriptcode">Reply</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </li>
    </ol>

<?php if(!$isOwner):?>
    <button id="newReview">Review Restaurant</button><br><br>
    <div id="reviewContent">
        <form action="/controllers/action_addReview.php" method="post" id="reviewForm">
            <input type="hidden" name="restaurant_id" value="<?php echo $restaurant["id"];?>">
            <label>Title:
                <input type="text" name="title" id="title" required maxlength="50">
            </label><br>
            <label>Body:
                <textarea id="body" rows="5" cols="100" name="body" maxlength="255" id="body" required></textarea>
            </label><br>
            <label>Rating:
                <input type="number" name="rating" id="rating" required min="0" max="10">/10
            </label><br>
            <input type="submit" value="Save">
        </form>
    </div>
<?php endif;?>

    <input type="button" onclick="location.href='/restaurantsPage.php'" value="Back" />

<?
include('resources/templates/footer.php');
?>