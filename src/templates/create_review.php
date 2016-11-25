<? /*if (!(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true)) {
    header('Location: mainPage.php');
}*/?>
<div id="content">
    <div class="review">
    <?//TODO?>
        <form action="" method="post">
            <label>Title: 
                <input type="text" name="title" required>
            </label>
            <label>Rating: 
                <input type="number" name="rating" required>/10
            </label>
            <label>Body: 
                <textarea rows="10" cols="100" name="body" required>
                </textarea>
            </label>
            <input type="submit" value="Save">
        </form>
    </div>
</div>
