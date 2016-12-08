<?php
$db;
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/users.php');
include('templates/header.php');
$user = getUserByName($_SESSION["username"]);
?>


<!DOCTYPE html>
<html>
<head>
	<title>RestaurantFinder - User</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="public/css/stylesheet.css">
</head>
<body>
<div id="header">
    <img src ="resources/logo.png" width="150" height="150">
    <h1>RestaurantFinder</h1>
</div>
<div id="content">
    <h2>Edit Account</h2>
	<div class="user">
		<form action="/controllers/action_updateUser.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id'];?>">
			<input type="hidden" name="email" value="<?php echo $user['email'];?>">
            <label>
                First Name: <input type="text" name="first_name" placeholder="<?php echo $user['first_name'];?>">
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="last_name" placeholder="<?php echo $user['last_name'];?>">
            </label>
            <br>
            <label>
                Age: <input type="text" name="age" placeholder="<?php echo $user['age'];?>">
            </label>
            <br>
            <label>
                Address: <input type="text" name="address" placeholder="<?php echo $user['address'];?>">
            </label>
            <br>
            <label>
                New Password: <input type="password" name="password">
            </label>
            <br>
            <label>
                Repeat new password: <input type="password" name="password2">
            </label>
            <br>
            <label>
                Old Password: <input type="password" name="old_password" required>
            </label>
            <br>
			<input type="submit" value="Save">
		</form>
	</div>
</div>
</body>
</html>

<?php
    include('templates/footer.php');
?>