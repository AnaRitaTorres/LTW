<!-- Button to open the modal login form -->
<button onclick="document.getElementById('id02').style.display='block'">Register</button>

<!-- The Modal -->
<div id="id02" class="modal">
  <span onclick="document.getElementById('id02').style.display='none'"
        class="close" title="Close Modal">&times;</span>

    <!-- Modal Content -->
    <form class="modal-content animate" action="/controllers/action_register.php" method="post" id="registerForm">
        <div class="container">
            <label>
                First Name: <input type="text" name="firstName" id="firstName">
            </label>
            <label>
                Last Name: <input type="text" name="lastName" id="lastName">
            </label>
            <label>
                Username: <input type="text" name="username" id="username">
            </label>
            <br>
            <label>
                Email: <input type="email" name="email" id="email">
            </label>
            <br>
            <label>
                Password: <input type="password" name="password"  id="password">
            </label>
            <br>
            <label>
                Confirm Password: <input type="password" name="cpassword" id="cpassword">
            </label>
            <br>

            <button type="submit">Register</button>
        </div>

        <div class="container" style="background-color:#f1f1f1">
            <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>