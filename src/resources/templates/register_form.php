<section id="content">
    <h2>Register</h2>
    <form action="/controllers/action_register.php" method="post">
        <label>
            Name: <input type="text" name="name" required>
        </label>
        <br>
        <label>
            Email: <input type="email" name="email" required>
        </label>
        <br>
        <label>
            Password: <input type="password" name="password" required>
        </label>
        <br>
        <label>
            Repeat Password: <input type="password" name="password2" required>
        </label>
        <br>
        <input type="submit" value="Login">
    </form>
</section>