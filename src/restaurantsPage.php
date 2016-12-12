<?php
$db;
include('resources/templates/header.php');
include('controllers/validation.php');
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
$user = getUserByName($_SESSION['username']);
$restaurants = getAllRestaurants();
$user_restaurants = getUserRestaurants($user["id"]);
?>

    <div class="content">
        <h3>My Restaurants</h3>
        <div class="user_restaurants">
            <ul>
                <?php foreach ($user_restaurants as $row): ?>
                    <li>
                        <a href="<?= '/restaurant.php?id=' . $row['id'] ?>"><?php echo $row["name"]; ?></a>
                    </li>
                <?php endforeach; ?>
            </ul>
            <button onclick="location.href='/createRestaurantPage.php'" class="newRestbtn">New Restaurant</button>
        </div>

        <h3>Restaurants</h3>
        <div class="search_restaurants">
            <form action="#" method="get">
                <label>Search:
                    <input id="restaurant_name" name="restaurant" type="text">
                </label>
            </form>
            <ul id="suggestions">
            </ul>
        </div>
    </div>
<?
include('resources/templates/footer.php');
?>