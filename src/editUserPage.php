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
		$user = getUserByName($_SESSION["username"]);
    ?>
</head>
<body>
<div id="content">
	<div class="user">
		<form action="/controllers/action_updateUser.php" method="post">
            <input type="hidden" name="id" value="<?php echo $user['id'];?>">
			<input type="hidden" name="email" value="<?php echo $user['email'];?>">

            First Name: <input type="text" name="first_name" placeholder="<?php echo $user['first_name'];?>"><br>
            Last Name: <input type="text" name="last_name" placeholder="<?php echo $user['last_name'];?>"><br>

            Age: <input type="text" name="age" placeholder="<?php echo $user['age'];?>"><br>
            Address: <input type="text" name="address" placeholder="<?php echo $user['address'];?>"><br>

            New Password: <input type="password" name="password"><br>
            Repeat new password: <input type="password" name="password2"><br>
            Old Password: <input type="password" name="old_password" required><br>
			<input type="submit" value="Save">
		</form>
	</div>
</div>
</body>
</html>