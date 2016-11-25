<? if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header('Location: mainPage.html');
}?>
<div id="content">
    <div class="review">
      //TODO
        <form action="" method="post">
            <input type="text" name="title" required><br>
            <input type="number" name="rating" required><br>
            <textarea rows="10" cols="100" name="fulltext" required>
            </textarea><br>
            <input type="submit" value="Save">
        </form>
    </div>
</div>
