<?php
$db;
include('resources/templates/header.php');
include('controllers/validation.php');
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
include('database/reviews.php');
$sessionUser = getUserByName($_SESSION['username']);
$user = getUserByName(trim(strip_tags($_GET["username"])));
if(!$user){
    header("Location: /mainPage.php");
}
if($user["username"] === $sessionUser["username"])
    $isOwner = true;
else $isOwner = false;

$restaurants = getUserRestaurants($user["id"]);
$reviews = getUserReviews($user["id"]);
$fullName = $user['first_name'] . ' ' . $user['last_name'];

?>

<div class="profile">
    <h3><?php echo (htmlentities($fullName) . ' profile');?></h3>

    <div id="wrapInf">
        <?php if($user["profilePic"] != null):?>
            <div class="userPic">
                 <img class="img-circle" src="<?php echo $user["profilePic"] ?>">
            </div>
        <?php endif;?>

        <div class="info">
            <label>Username: </label> <?php echo $user['username']?>.
            <br>
            <label>Email:</label> <a href="mailto:<?php echo $user['email']?>"><?php echo $user['email']?></a>.
            <br>
            <label>Age: </label> <?php echo $user['age']?> Years Old.
            <br>
            <label>Gender: </label> <?php echo $user['gender']?>.
            <br>
        </div>
    </div>

    <div class="ownership">
        <p><?php echo $fullName;?> owns <?php echo count($restaurants);?> restaurant<?php if(count($restaurants) != 1) echo 's'?>:</p>
        <ul>
            <?php foreach ($restaurants as $row): ?>
                <li>
                    <a href="<?= '/restaurant.php?id=' . $row['id'] ?>"><?php echo $row["name"]; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

    <div class="reviews">
        <p><?php echo $fullName;?> reviewed <?php echo count($reviews);?> restaurant<?php if($reviews != 1) echo 's'?>:</p>
        <ul>
            <?php foreach ($reviews as $row): ?>
                <li>
                    <a href="<?= '/restaurant.php?id=' . $row['restaurant_id'] ?>"><?php echo getRestaurantName($row['restaurant_id']); ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>


    <?php if($isOwner):?>
        <button onclick="location.href='<?= '/editUserPage.php?id=' . $user['id'] ?>';" class="edittbtn">Edit Account</button>
    <?php endif;?>
</div>

    <button onclick="location.href='/mainPage.php'" class="backbtn">Back</button>

<?
include('resources/templates/footer.php');
?>