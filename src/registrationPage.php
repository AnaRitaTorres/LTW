<!DOCTYPE html>
<html>
<head>
	<title>RestaurantFinder - Register</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="public/css/stylesheet.css">
</head>
<body>
<div id="header">
    <img src ="resources/logo.png" width="150" height="150">
    <h1>RestaurantFinder</h1>
</div>
  <section id="content">
      <h2>Register</h2>
        <form action="/controllers/action_register.php" method="post">
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
  </section>
</body>
</html>