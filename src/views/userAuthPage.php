<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="../public/css/stylesheet.css">
</head>
<body>
  <?    
    include('/resources/templates/header.php');
  ?>

  <div id="content">
	  <div class="user">
		  <form action="/controllers/login.php" method="post">
			  <label>Name:
				  <input type="text" name="name" required>
			  </label>
			  <label>Email:
				  <input type="email" name="email" required>
			  </label>
			  <label>Password:
				  <input type="password" name="password" required>
			  </label>
			  <label>Repeat password:
				  <input type="password" name="password2" required>
			  </label>
			  <input type="submit" value="Login">
		  </form>
	  </div>
  </div>

  <?
  	include('templates/footer.php');
  ?>
</body>
</html>