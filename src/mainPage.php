<?php
   include('resources/templates/header.php');
?>

<div class="main">
    <p>Welcome <?php session_start(); echo $_SESSION['username']; ?>!</p>
    <a href="editUserPage.php">Edit User Information</a><br>
    <a href="restaurantsPage.php">Restaurants</a><br>
</div>

<?php
	include('resources/templates/footer.php');
?>