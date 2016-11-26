<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="/public/css/stylesheet.css">
</head>
<body>
<?
    include('/controllers/validation.php');
?>

<div class="form">
    <p>Welcome <?php session_start(); echo $_SESSION['username']; ?>!</p>
    <a href="/controllers/logout.php">Logout</a>
</div>
</body>
</html>
