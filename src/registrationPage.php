<!DOCTYPE html>
<html>
<head>
	<title>RestaurantFinder - Register</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href=" https://fonts.googleapis.com/css?family=Rock+Salt">
</head>
<body>
<div id="header">
    <img scr="images/logo1.png">
    <h1>Restaurant Reviewer</h1>
</div>
  <section id="content">
      <h2>Register</h2>
      <form action="/controllers/action_register.php" method="post">
          Name: <input type="text" name="name" required><br>
          Email: <input type="email" name="email" required><br>
          Password: <input type="password" name="password" required><br>
          Repeat Password: <input type="password" name="password2" required><br>
          <input type="submit" value="Login">
      </form>
  </section>
</body>
</html>