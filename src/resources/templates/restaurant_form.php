<div class="createRestaurant">
    <form action="/controllers/action_createRestaurant.php" method="post">
        <label>Name:
            <input type="text" name="name" required>
        </label>
        <br>
        <label>Category:
            <select name="category">
                <option value="seafood">Seafood</option>
                <option value="italian">Italian</option>
                <option value="asian">Asian</option>
                <option value="fastfood">Fast Food</option>
            </select>
        </label>
        <br>
        <label>Price:
            <input type="number" name="price">
        </label>
        <br>
        <label>Description:
            <textarea rows="5" cols="40" name="description" required></textarea>
        </label>
        <br>
        <input type="submit" value="Save">
    </form>
</div>