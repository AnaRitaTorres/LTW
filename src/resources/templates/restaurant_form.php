<div class="createRestaurant">
    <form action="/controllers/action_createRestaurant.php" id="restaurantForm" method="post">
        <label>Name:
            <input type="text" name="name" required id="name">
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
            <input type="number" name="price" id="price" min="1" >
        </label>
        <br>
        <label>Description:<br>
            <textarea rows="10" cols="90" name="description" id="description" required></textarea>
        </label>
        <br>
        <button type="submit"class="savebtn">Save</button>
    </form>
</div>