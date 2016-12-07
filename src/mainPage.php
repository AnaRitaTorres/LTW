<?
    include('controllers/validation.php');
	include('templates/header.php');
?>

<div class="form">
    <p>Welcome <?php session_start(); echo $_SESSION['username']; ?>!</p>
    <a href="editUserPage.php">Edit User Information</a><br>
    <a href="restaurantsPage.php">Restaurants</a><br>
    <a href="/controllers/logout.php">Logout</a>
</div>

<?
	include('templates/footer.php');
?>