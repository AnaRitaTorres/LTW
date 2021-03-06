<?php
$db;
include('resources/templates/header.php');
include_once ('controllers/validation.php');
include_once('database/connection.php');
include_once('database/users.php');
$user = getUserByName($_SESSION["username"]);
$idUser = $_GET["id"];

if($user["id"] != $idUser)
    header("Location: " . $_SERVER['HTTP_REFERER']);
?>

<h2>Edit User's Account</h2>
<div id="content">
    <div class="user">
        <?php if($user["profilePic"] == null):?>
            <div class="upload">
                <form action="/controllers/uploadProfilePic.php" method="post" enctype="multipart/form-data">
                    <label>Profile Picture:</label><br><br>
                    <input id="user_id" type="hidden" name="id" value="<?php echo $user['id'];?>"/>
                    <input type="file" name="image" id="image" required>
                    <input type="submit" value="Upload">
                </form>
            </div>
        <?php endif;?>

		<form action="/controllers/action_updateUser.php" method="post" id="editUserForm">
            <input type="hidden" name="user_id" id="user_id" value="<?php echo $user['id'];?>">

            <label>First Name: <input type="text" name="firstName" id="firstName" placeholder="<?php echo $user['first_name'];?>">
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="lastName" id="lastName" placeholder="<?php echo $user['last_name'];?>">
            </label>
            <br>
            <label>
                Age: <input type="number" name="age" id="age" min="18" max="100" value="<?php echo $user['age'];?>">
            </label>
            <br>
            <label>
                New Password: <input type="password" name="password" id="password" minlength="8">
            </label>
            <br>
            <label>
                Repeat new password: <input type="password" name="password2" id="password2" minlength="8">
            </label>
            <br>
            <label>
                Current Password: <input type="password" name="old_password" id="old_password" required>
            </label>
            <br>
            <button type="submit"class="savebtn">Save</button>
		</form>
	</div>

</div>
    <button onclick="location.href='/mainPage.php'" class="backbtn">Back</button>

<?php
include('resources/templates/footer.php');
?>