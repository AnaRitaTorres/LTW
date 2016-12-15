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
            <button onclick="location.href='/createRestaurantPage.php'" class="defaultbtn">New Restaurant</button>
        </div>

        <h3>Restaurants</h3>
        <div class="search_restaurants">
            <form action="#" method="get" id="searchForm">
                <input id="restaurant_name" name="restaurant" type="text" placeholder="Search..">
                <div id="searchType">
                    <input type="radio" name="type" value="Default" checked />
                    <label >Default</label>

                    <input type="radio" name="type" value="Category"/>
                    <label>Category</label>

                    <input type="radio" name="type" value="Location"/>
                    <label>Location</label>
                </div>
            </form>
            <ul id="suggestions">
            </ul>
        </div>

        <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3ef8eoV1JXRWq-OG3kSxr4uQyfiKKps&callback=geocodeLocations&libraries=places"></script>

    </div>

    <button onclick="location.href='/mainPage.php'" class="backbtn">Back</button>
<?
include('resources/templates/footer.php');
?>