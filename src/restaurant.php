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
$restaurant = getRestaurantByID(trim(strip_tags($_GET["id"])));
$isOwner = isOwner($user["id"], $restaurant["id"]);
$reviews = getRestaurantReviews($restaurant["id"]);
$images = getRestaurantImages($restaurant["id"]);
$nReviews = getNrReviews($user["id"], $restaurant["id"]);
$owners = getOwners($restaurant["id"]);
$rating = getRestaurantAvgRating($reviews);

if(!$restaurant){
    header('Location: /mainPage.php');
}

include('resources/templates/reply_form.php');
?>
    <div>
        <h2><?php echo htmlentities($restaurant["name"]); ?></h2>
        <div id="descriptionRes">
        <?php echo $restaurant["description"]; ?>
        </div>
        <h4>Additional Information</h4>
    </div>

    <div class="info">
        <div id="text">
            <label>Inaugurated On </label> <?php echo $restaurant["inauguration"]; ?>
            <br>
            <label>Average Price </label> <?php echo $restaurant["price"]; ?>$
            <br>
            <label>Category </label> <?php echo $restaurant["category"]; ?>
            <br>
        </div>
        <button href="<?php echo utf8_decode(urldecode($restaurant["website"]))?>" class="checkbtn">Checkout Their Website</button>
    </div>


<?php
if(count($images) > 0)
    include('resources/templates/gallery.php');
?>

    <h3>Location</h3>
    <div id="location"></div>
    <input type="hidden" name="restaurantId" id="restaurantId" value="<?php echo $restaurant["id"];?>">

    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3ef8eoV1JXRWq-OG3kSxr4uQyfiKKps&callback=showMap&libraries=places"></script>

    <div class="owners">
        <h4>Owners</h4>
        <p>This Restaurant is Owned by:
            <?php for($i = 0; $i < count($owners); $i++): ?>
                <a href="profilePage.php?username=<?php echo $owners[$i]["username"]?>">
                <?php if(count($owners) == 1)
                    echo ($owners[$i]["username"] . '.</a>');
                else if($i == count($owners) - 1)
                    echo ('and '.$owners[$i]["username"] . '.</a>');
                else echo ($owners[$i]["username"] . ' </a>');
            endfor; ?>
        </p>
    </div>

    <ol class="commentList">
        <h4>Reviews</h4>
        <p id="avgRating">This Restaurant was Rated by <?php echo count($reviews)?> Users and has an Average Rating of <?php echo $rating?> in 10. </p>
        <li class="comment" id="comment">
            <?php foreach ($reviews as $review): $author = getUserByID($review['user_id']);?>
                <div class="commentBlock" id="comment<?php echo $review['id']?>">
                    <div class="comment-head">
                        <a id="hideBody">[-]</a>
                        <a class="fn" href="profilePage.php?username=<?php echo $author["username"]?>"><?php echo $author["username"]?></a>
                        <a><?php echo $review['score']?>/10 points</a>
                        <a><?php echo $review['date']?></a>
                    </div>

                    <div class="comment-body">
                        <br>
                        <p id="title"><?php echo $review['title']?></p>
                        <br>
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
                    foreach ($replies as $reply): $replyUser = getUserByID($reply["user_id"]);?>
                        <div class="commentBlock" id="reply<?php echo $reply['id']?>">
                            <div class="comment-head">
                                <a id="hideReply">[-]</a>
                                <a class="fn" href="profilePage.php?username=<?php echo $replyUser["username"]?>"><?php echo $replyUser["username"]?></a>
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
                <textarea id="body" rows="5" cols="10" name="body" maxlength="255" id="body" required></textarea>
            </label><br>
            <label>Rating:
                <input type="number" name="rating" id="rating" required min="1" max="10">/10
            </label><br>
            <button type="submit"class="savebtn">Save</button>
        </form>
    </div>
<?php endif;?>

<?php if($isOwner):?>
    <button onclick="location.href='<?= '/editRestaurantPage.php?id=' . $restaurant['id'] ?>';"class="editbtn1">Edit Restaurant</button>
<?php endif;?>

    <button onclick="location.href='/restaurantsPage.php'" class="backbtn">Back</button>
<?
include('resources/templates/footer.php');
?>