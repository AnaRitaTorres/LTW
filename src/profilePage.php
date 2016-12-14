<?php
$db;
include('resources/templates/header.php');
include('controllers/validation.php');
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
include('database/reviews.php');
$sessionUser = getUserByName($_SESSION['username']);
$user = getUserByName($_GET["username"]);
if($user["username"] === $sessionUser["username"])
    $isOwner = true;
else $isOwner = false;

$restaurants = getUserRestaurants($user["id"]);
$reviews = getUserReviews($user["id"]);
$fullName = $user['first_name'] . ' ' . $user['last_name'];

?>

<div class="profile">
    <h3><?php echo ($fullName . ' profile');?></h3>

    <?php if($user["profilePic"] != null):?>
        <div class="userPic">
            <img src="<?php echo $user["profilePic"] ?>">
        </div>
    <?php endif;?>

    <div class="info">
        <p>Username: <?php echo $user['username']?>.</p>
        <p>Email: <a href="mailto:<?php echo $user['email']?>"><?php echo $user['email']?></a>.</p>
        <p>Age: <?php echo $user['age']?> years old.</p>
        <p>Gender: <?php echo $user['gender']?>.</p>
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
</div>

<?php if($isOwner):?>
    <button onclick="location.href='<?= '/editUserPage.php?id=' . $user['id'] ?>';" class="edittbtn">Edit Account</button>
<?php endif;?>

    <button onclick="location.href='/mainPage.php'" class="backbtn">Back</button>

<?
include('resources/templates/footer.php');
?>