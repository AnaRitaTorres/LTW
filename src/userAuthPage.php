<?php
error_reporting(E_ALL);
ini_set('display_errors', '1');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="public/css/stylesheet.css">
</head>
<body>
  <?    
    include('resources/templates/header.php');
  ?>

  <div id="content">
	  <div class="user">
		  <form action="controllers/login.php" method="post">
			  <label>Name:
				  <input type="text" name="name" required>
			  </label>
			  <br>
			  <label>Password:
				  <input type="password" name="password" required>
			  </label>
			  <br>
			  <input type="submit" value="Login">
		  </form>
	  </div>
	  <p>Not registered yet? <a href='registrationPage.php'>Register Here</a></p>
  </div>

  <?
  	include('resources/templates/footer.php');
  ?>
</body>
</html>