<?php
    include('resources/templates/header.php');
    include('controllers/validation.php');
?>

<div class="main">
    <p id="user">Welcome <?php echo $_SESSION['username']; ?>!</p>
    <button onclick="location.href='/editUserPage.php'" class="userbtn">Edit User Information</button>
    <button onclick="location.href='/restaurantsPage.php'" class="restaurantbtn">Restaurants</button>
  </div>

<?php
	include('resources/templates/footer.php');
?>