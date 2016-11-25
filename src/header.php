<div id="header">
	<h1>Restaurant Reviews</h1>
	<h2></h2>
</div>
<div id="login">
    <?if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) { ?>
        <form action="logout.php" method="post">
            <input type="submit" value="Log out">
        </form>
        <form action="create_news.php" method="post">
            <input type="submit" value="new">
        </form>
    <?} else {?>
        <form action="login.php" method="post">
            <input type="text" name="username">
            <input type="passsword" name="password"><br>
            <input type="submit" value="Log in">
        </form>
    <?}?>
</div>
<div id="types">
	<ul>
    <li><a href="">Italian</a></li>
    <li><a href="">Asian</a></li>
    <li><a href="">Fast Food</a></li>
    <li><a href="">Gourmet</a></li>
    <li><a href="">Take-Out</a></li>
    <li><a href="">Drive-In</a></li>
    <li><a href="">Traditional Cuisine</a></li>
    <li><a href="">Seafood</a></li>
	</ul>
</div>
