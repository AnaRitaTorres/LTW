<!DOCTYPE html>
<html>
<head>
	<title>Restaurant Reviews</title>
	<meta charset='UTF-8'>
	<link rel="stylesheet" href="public/css/stylesheet.css">
</head>
<body>
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