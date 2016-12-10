<?php
$db;
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/users.php');
$user = getUserByName($_SESSION["username"]);

include('resources/templates/header.php');
?>

<div id="content">
    <h2>Edit User's Account</h2>
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
                New Password: <input type="password" name="password" minlength="8">
            </label>
            <br>
            <label>
                Repeat new password: <input type="password" name="password2" minlength="8">
            </label>
            <br>
            <label>
                Current Password: <input type="password" name="old_password" required>
            </label>
            <br>
            <button type="submit">Save</button>
		</form>
	</div>
</div>

<?php
include('resources/templates/footer.php');
?>