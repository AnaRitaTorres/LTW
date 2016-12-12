$(document).ready(function(){
    var map;
    var markers = [];
    var lat;
    var lng;
    var geocoder;
    var infowindow;
    var locationID;
    window.initMap = function () {
        var uluru = {lat: 38.736946, lng: -9.142685};
        geocoder = new google.maps.Geocoder;
        infowindow = new google.maps.InfoWindow;
        map = new google.maps.Map($("#map")[0], {
            zoom: 6,
            center: uluru
        });

        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });

        function placeMarker(location) {
            deleteMarkers();
            var marker = new google.maps.Marker({
                position: location,
                map: map
            });
            lat = marker.getPosition().lat();
            lng = marker.getPosition().lng();
            markers.push(marker);
            setDescription(geocoder, map, infowindow);
        }

        // Sets the map on all markers in the array.
        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        // Removes the markers from the map, but keeps them in the array.
        function clearMarkers() {
            setMapOnAll(null);
        }

        // Deletes all markers in the array by removing references to them.
        function deleteMarkers() {
            clearMarkers();
            markers = [];
        }

        function setDescription(geocoder, map, infowindow) {
            var latlng = {lat: lat, lng: lng};
            geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    if (results[1]) {
                        infowindow.setContent(results[1].formatted_address);
                        locationID = results[1].place_id;
                        infowindow.open(map, markers[0]);
                    } else {
                        window.alert('No results found');
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                }
            });
        }
    }

    var restaurantMap;
    window.showMap = function () {
        var location;
        restaurantMap = new google.maps.Map($("#location")[0], {
            zoom: 8,
            center: {lat: 40.72, lng: -73.96}
        });
        getLocationID();

        var geocoder = new google.maps.Geocoder;
        var infowindow = new google.maps.InfoWindow;

        function getLocationID() {
            if (window.XMLHttpRequest) {
                // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else {
                // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    location = this.responseText;
                    geocodePlaceId(geocoder, restaurantMap, infowindow);
                }
            };
            var restaurantId = $("#restaurantId").val();
            xmlhttp.open("GET","/controllers/action_retrieveLocation.php?id=" + restaurantId,true);
            xmlhttp.send();
        }

        // This function is called when the user clicks the UI button requesting
        // a reverse geocode.
        function geocodePlaceId(geocoder, map, infowindow) {
            geocoder.geocode({'placeId': location}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            restaurantMap.setZoom(11);
                            restaurantMap.setCenter(results[0].geometry.location);
                            var marker = new google.maps.Marker({
                                map: map,
                                position: results[0].geometry.location
                            });
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);
                        } else {
                            window.alert('No results found');
                        }
                    } else {
                        window.alert('Geocoder failed due to: ' + status);
                    }
                }
            )};
    }

    var request;
    $("#restaurantForm").submit(function(event){

        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }

        if(markers.length == 0 && locationID == null) {
            return false;
        }

        var name = $("#restaurantForm").find("#name").val();
        var description = $("#restaurantForm").find("#description").val();
        var category = $("#restaurantForm").find("#category").val();
        console.log(name)

        request = $.ajax({
            type : 'POST',
            url  : '/controllers/action_createRestaurant.php',
            data : {
                "name": name,
                "description": description,
                "category": category,
                "location": locationID
            },
            datatype: "text",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it worked!");
            window.location = "restaurantsPage.php";
        });

        // Callback handler that will be called on failure
        request.fail(function (jqXHR, textStatus, errorThrown){
            // Log the error to the console
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    });
});