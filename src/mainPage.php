<?php
    include('resources/templates/header.php');
    include('controllers/validation.php');
?>

<div class="main">
    <p id="user">Welcome <?php echo $_SESSION['username']; ?>!</p>
    <button onclick="location.href='/profilePage.php?username=<?php echo $_SESSION['username']; ?>'" class="defaultbtn">Profile</button>
    <button onclick="location.href='/restaurantsPage.php'" class="defaultbtn">Restaurants</button>
  </div>

<?php
	include('resources/templates/footer.php');
?>