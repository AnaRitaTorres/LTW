<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id02').style.display='block'">Register</button>

<!-- The Modal -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'"
        class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="/controllers/action_register.php" method="post">
        <div class="container">
            <label>
                First Name: <input type="text" name="firstName" id="register_firstname" required>
            </label>
            <label>
                Last Name: <input type="text" name="lastName" id="register_lastname" required>
            </label>
            <label>
                Username: <input type="text" name="username" id="register_username" required>
            </label>
            <br>
            <label>
                Email: <input type="email" name="email" id="register_email" required>
            </label>
            <br>
            <label>
                Password: <input type="password" name="password"  id="register_password" required>
            </label>
            <br>
            <label>
                Confirm Password: <input type="password" name="password2" id="register_cpassword" required>
            </label>
            <br>

            <button type="submit">Register</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>