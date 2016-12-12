<div class="createRestaurant">
    <form action="/controllers/action_createRestaurant.php" method="post" id="restaurantForm">
        <label>Name:
            <input type="text" name="name" id="name" required>
        </label>
        <br>
        <label>Category:
            <select name="category" id="category">
                <option value="seafood">Seafood</option>
                <option value="italian">Italian</option>
                <option value="asian">Asian</option>
                <option value="fastfood">Fast Food</option>
            </select>
        </label>
        <br>
        <label>Price:
            <input type="number" name="price" id="price">
        </label>
        <br>
        <label>Description:
            <textarea rows="10" cols="77" name="description" id="description" required></textarea>
        </label>
        <br>
        <input type="submit" value="Save">
    </form>
</div>