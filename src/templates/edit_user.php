<?/* if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header('Location: mainPage.php');
}*/?>
<div id="content">
    <div class="user">
        <?//TODO send info to dabase?>
        <form action="" method="post">
            <input type="hidden" name="email" value=""><?//TODO get logged in user's email?>
            <label>Name:
                <input type="text" name="name">
            </label>
            <label>New Password:
                <input type="password" name="password">
            </label>
            <label>Repeat new password:
                <input type="password" name="password2">
            </label>
            <label>Old Password:
                <input type="password" name="old_password" required>
            </label>
            <input type="submit" value="Save">
        </form>
    </div>
</div>
