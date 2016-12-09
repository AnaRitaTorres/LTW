<?php
   include('resources/templates/header.php');
?>

<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="public/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rock+Salt">
 </head>
 <body>
     <div class="main">
        <p>Welcome <?php session_start(); echo $_SESSION['username']; ?>!</p>
        <a href="editUserPage.php">Edit User Information</a><br>
        <a href="restaurantsPage.php">Restaurants</a><br>
    </div>
</body>
</html>

<?php
	include('resources/templates/footer.php');
?>