<?php
    include('resources/templates/header.php');
    include_once ('controllers/validation.php');
?>
    <h3>Restaurant Information</h3>

    <h4>Location</h4>
    <div id="map"></div>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAg3ef8eoV1JXRWq-OG3kSxr4uQyfiKKps&callback=initMap&libraries=places"></script>

<?php
    include('resources/templates/restaurant_form.php');
?>
    <br>
    <button onclick="location.href='/restaurantsPage.php'" class="backbtn">Back</button>
<?php
    include('resources/templates/footer.php');
?>