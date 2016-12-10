<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id01').style.display='block'" class="loginbtn">Login</button>

<!-- The Modal -->
<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'"
		class="close" title="Close Modal">&times;</span>

	<!-- Modal Content -->
	<form class="modal-content animate" action="/controllers/login.php" method="post" id="loginForm">
		<div class="container">
			<label><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" id="username" required>

			<label><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="password" id="password" required>

			<button type="submit">Login</button>
			<input type="checkbox" checked="checked"> Remember Me
		</div>

		<div class="container" style="background-color:#f1f1f1">
			<button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
			<span class="psw">Not Registered Yet? <a href="#">Click Here</a></span>
		</div>
	</form>
</div>