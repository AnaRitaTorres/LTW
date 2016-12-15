<div class="createRestaurant">
    <form action="/controllers/action_createRestaurant.php" id="restaurantForm" method="post">
        <label>Name:
            <input type="text" name="name" required id="name" maxlength="50">
        </label>
        <br>
        <label>Category:
            <select name="category" id="category">
                <option value="Seafood">Seafood</option>
                <option value="Italian">Italian</option>
                <option value="Asian">Asian</option>
                <option value="Bakery">Bakery</option>
                <option value="Barbecue">Barbecue</option>
                <option value="Pizzeria">Pizzeria</option>
                <option value="Steak House">Steak House</option>
                <option value="Vegetarian">Vegetarian</option>
                <option value="Fast Food">Fast Food</option>
            </select>
        </label>
        <br>
        <label>Average Price:
            <input type="number" name="price" id="price" min="1" step="0.1" required>
        </label>
        <br>
        <label>Inauguration:
            <input type="date" name="inauguration" id="inauguration" min="2000-01-01" required>
        </label>
        <br>
        <label>Website:
            <input type="url" name="url" id="url" required>
        </label>
        <br>
        <label>Description:<br>
            <textarea rows="5" cols="90" name="description" id="description" maxlength="255" required></textarea>
        </label>
        <br>
        <button type="submit"class="savebtn">Save</button>
    </form>
</div>