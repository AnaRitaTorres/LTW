<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="/public/css/stylesheet.css">

    <?php
		$db;
        include_once ('controllers/validation.php');
        include_once('database/connection.php');
		include_once('database/users.php');
		session_start();
		$user = getUserByName($_SESSION["username"]);
    ?>
</head>
<body>
<div id="content">
	<div class="user">
		<form action="" method="post">
			<input type="hidden" name="email" value="">
			<label>Name:
				Name: <input type="text" name="name" value="<?php echo $user['first_name'];?>">
			</label>
			<label>New Password:
				<input type="password" name="password">
			</label>
			<label>Repeat new password:
				<input type="password" name="password2">
			</label>
			<label>Old Password:
				<input type="password" name="old_password" required>
			</label>
			<input type="submit" value="Save">
		</form>
	</div>
</div>
</body>
</html>