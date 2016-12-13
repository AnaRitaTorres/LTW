<button class="loginbtn">Login</button>

<div id="id01" class="modal">
    <span class="close" id="loginClose" title="Close Modal">&times;</span>

    <form class="modal-content animate" action="/controllers/login.php" method="post" id="loginForm">
        <div class="container">
            <label>Username</label><br>
            <input type="text" placeholder="Enter Username" name="username" id="username" required>

            <br><label>Password</label><br>
            <input type="password" placeholder="Enter Password" name="password" id="password" required>

            <button type="submit">Login</button>
        </div>

        <div class="container" id="bottomForm">
            <button type="button" id="loginCancel" class="cancelbtn">Cancel</button>
            <span class="psw">Not Registered Yet? <a id="notRegistered" href="#">Click Here</a></span>
        </div>
    </form>
</div>