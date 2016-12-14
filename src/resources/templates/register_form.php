<button class="registerbtn">Register</button>

<div id="id02" class="modal">
    <span id="registerClose" class="close" title="Close Modal">&times;</span>

    <form class="modal-content animate" action="/controllers/action_register.php" method="post" id="registerForm">
        <div class="container">
            <label>
                First Name: <input type="text" name="firstName" id="firstName">
            </label>
            <br>
            <label>
                Last Name: <input type="text" name="lastName" id="lastName">
            </label>
            <label>
                Gender: <br>
                <input type="radio" name="gender" value="male" checked> Male<br>
                <input type="radio" name="gender" value="female"> Female<br>
            </label>
            <br>
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

        <div class="container" id="bottomForm">
            <button type="button" id="registerCancel" class="cancelbtn">Cancel</button>
        </div>
    </form>
</div>