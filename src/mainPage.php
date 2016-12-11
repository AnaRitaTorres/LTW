<?php
    include('resources/templates/header.php');
    include('controllers/validation.php');
?>

<div class="main">
    <p>Welcome <?php echo $_SESSION['username']; ?>!</p>
    <a href="editUserPage.php">Edit User Information</a><br>
    <a href="restaurantsPage.php">Restaurants</a><br>
</div>

<?php
	include('resources/templates/footer.php');
?>