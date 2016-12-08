<div id="content">
	<div class="user">
		<form action="/controllers/login.php" method="post">
			<label>Username:
				<input type="text" name="name" id="name" required>
			</label>
			<br>
			<label>Password:
				<input type="password" name="password" id="password" required>
			</label>
			<br>
			<input type="submit" name="login" value="Login" id="login">
		</form>
	</div>
	<p>Not Registered Yet? <a href='../../registrationPage.php'>Register Here</a></p>
</div>