<? if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    header('Location: mainPage.php');
}?>
<div id="content">
    <div class="user">
        <?//TODO send info to dabase?>
        <form action="" method="post">
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
            <input type="submit" value="Register">
        </form>
    </div>
</div>
