<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="../public/css/stylesheet.css">

    <?php
        include_once ('/controllers/validation.php');
    ?>
</head>
<body>
<?
include('templates/header.php');
?>

<div id="content">
	<div class="user">
		<?//TODO send info to dabase?>
		<form action="" method="post">
			<input type="hidden" name="email" value=""><?//TODO get logged in user's email?>
			<label>Name:
				<input type="text" name="name">
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

<?
include('templates/footer.php');
?>

</body>
</html>