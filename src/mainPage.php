<?
    include('controllers/validation.php');
	include('templates/header.php');
?>
    <!DOCTYPE html>
    <html>
<<head>
    <title>Restaurant Reviews</title>
    <meta charset='UTF-8'>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Rock+Salt">
</head>
<body>
<header>
    <?php
    include('templates/header.php');
    ?>
</header>
<div class="form">
    <p>Welcome <?php session_start(); echo $_SESSION['username']; ?>!</p>
    <a href="editUserPage.php">Edit User Information</a><br>
    <a href="restaurantsPage.php">Restaurants</a><br>
    <a href="/controllers/logout.php">Logout</a>
</div>
</body>
</html>
<?
	include('templates/footer.php');
?>