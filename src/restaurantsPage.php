<?php
include('controllers/validation.php');
include('resources/templates/header.php');
$db;
include('database/connection.php');
include('database/users.php');
include('database/restaurants.php');
$user = getUserByName($_SESSION['username']);
$restaurants = getAllRestaurants();
$user_restaurants = getUserRestaurants($user["id"]);
?>

<h3>My Restaurants</h3>
    <div class="user_restaurants">
        <ul>
            <?php foreach ($user_restaurants as $row): ?>
            <li>
                <a href="<?= '/restaurant.php?id=' . $row['id'] ?>"><?php echo $row["name"]; ?></a>
            </li>
            <?php endforeach; ?>
        </ul>

        <input type="button" onclick="location.href='/createRestaurantPage.php';" value="New Restaurant" />
    </div>

<h3>All Restaurants</h3>
<!--Alterar isto para que o utilizar possa colocar um critério de pesquisa nos restaurantes a mostrar-->
    <div class="all_restaurants">
        <ul>
            <?php foreach ($restaurants as $row): ?>
                <li>
                    <a href="<?= '/restaurant.php?id=' . $row['id'] ?>"><?php echo $row["name"]; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>

<?
include('resources/templates/footer.php');
?>