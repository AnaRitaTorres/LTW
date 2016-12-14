<?php
$db;
include('resources/templates/header.php');
include('controllers/validation.php');
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
include('database/images.php');
include('database/reviews.php');
include('database/replies.php');

$user = getUserByName($_SESSION['username']);
$restaurant = getRestaurantByID($_GET["id"]);
$isOwner = isOwner($user["id"], $restaurant["id"]);
$reviews = getRestaurantReviews($restaurant["id"]);
$images = getRestaurantImages($restaurant["id"]);
$nReviews = getNrReviews($user["id"], $restaurant["id"]);

include('resources/templates/reply_form.php');
?>
    <div style="padding:20px;">
        <h2>Restaurant <?php echo $restaurant["name"]; ?></h2>
        <?php echo $restaurant["description"]; ?>
    </div>

<?php
include('resources/templates/gallery.php');
?>

    <!--
    <h3>Location</h3>
    <div id="location"></div>
    <input type="hidden" name="restaurantId" id="restaurantId" value="<?php /*echo $restaurant["id"];*/?>">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3ef8eoV1JXRWq-OG3kSxr4uQyfiKKps&callback=showMap&libraries=places"></script>
-->

    <ol class="commentList">
        <h4>Reviews</h4>
        <li class="comment" id="comment">
            <?php foreach ($reviews as $review):?>
                <div class="commentBlock" id="comment<?php echo $review['id']?>">
                    <div class="comment-head">
                        <a id="hideBody">[-]</a>
                        <cite class="fn"><?php $author = getUserByID($review['user_id']); echo $author["username"]?></cite>
                        <a><?php echo $review['score']?>/10 points</a>
                        <a><?php echo $review['date']?></a>
                    </div>

                    <div class="comment-body">
                        <p><?php echo $review['body']?></p>
                        <?php
                            $author = getUserByID($review['user_id']);
                            $replies = getReviewReplies($review["id"]);
                            $alreadyReplied = checkReplies($replies, $user["id"]);
                        if($author["username"] != $user["username"] && $alreadyReplied == false):?>
                        <div class="reply">
                            <a class="comment-reply-link" id="reply<?php echo $review['id']?>">Reply</a>
                        </div>
                        <?php endif;?>
                    </div>

                    <?php
                    foreach ($replies as $reply):?>
                        <div class="commentBlock" id="reply<?php echo $reply['id']?>">
                            <div class="comment-head">
                                <a id="hideReply">[-]</a>
                                <cite class="fn"> <?php $replyUser = getUserByID($reply["user_id"]); echo $replyUser["username"]?></cite>
                                <a><?php echo $reply['date']?></a>
                                <p id="replyBody"> <?php echo $reply['body']?></p>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </li>
    </ol>

<?php if(!$isOwner && $nReviews == 0):?>
    <button id="newReview">Review Restaurant</button><br><br>
    <div id="reviewContent">
        <form action="/controllers/action_addReview.php" method="post" id="reviewForm">
            <input type="hidden" name="restaurant_id" id="restaurant_id" value="<?php echo $restaurant["id"];?>">
            <label>Title:
                <input type="text" name="title" id="title" required maxlength="50">
            </label><br>
            <label>Body:<br>
                <textarea id="body" rows="5" cols="100" name="body" maxlength="255" id="body" required></textarea>
            </label><br>
            <label>Rating:
                <input type="number" name="rating" id="rating" required min="1" max="10">/10
            </label><br>
            <input type="submit" value="Save">
        </form>
    </div>
<?php endif;?>

<?php if($isOwner):?>
    <button onclick="location.href='<?= '/editRestaurantPage.php?id=' . $restaurant['id'] ?>';">Edit Restaurant</button>
<?php endif;?>

    <button onclick="location.href='/restaurantsPage.php'" class="backbtn">Back</button>
<?
include('resources/templates/footer.php');
?>