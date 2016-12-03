<!DOCTYPE html>
<html>
<head>
	<title>RestaurantFinder - Register</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="public/css/stylesheet.css">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Permanent+Marker" rel="stylesheet">
</head>
<body>
<div id="header">
    <img src ="resources/logo1.png" width="150" height="150">
    <h1>RestaurantFinder</h1>
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