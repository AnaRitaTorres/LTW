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

        function setMapOnAll(map) {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(map);
            }
        }

        function clearMarkers() {
            setMapOnAll(null);
        }

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
                        deleteMarkers();
                    }
                } else {
                    window.alert('Geocoder failed due to: ' + status);
                    deleteMarkers();
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
                xmlhttp = new XMLHttpRequest();
            } else {
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

        event.preventDefault();
        if (request) {
            request.abort();
        }

        if(markers.length == 0 && locationID == null) {
            $(".createRestaurant").find(".error").hide();
            var div = '<div class="error">Location not selected!</div>';
            $(".createRestaurant").append(div);
            return false;
        }

        var name = $("#restaurantForm").find("#name").val();
        var description = $("#restaurantForm").find("#description").val();
        var category = $("#restaurantForm").find("#category").val();
        var website = $("#restaurantForm").find("#url").val();
        var inauguration = $("#restaurantForm").find("#inauguration").val();
        var price = $("#restaurantForm").find("#price").val();

        request = $.ajax({
            type : 'POST',
            url  : '/controllers/action_createRestaurant.php',
            data : {
                "name": name,
                "description": description,
                "category": category,
                "price": price,
                "location": locationID,
                "website": website,
                "inauguration": inauguration
            },
            datatype: "text",
        });

        request.done(function (response, textStatus, jqXHR){
            window.location = "restaurantsPage.php";
        });

        request.fail(function (jqXHR, textStatus, errorThrown){
            console.error(
                "The following error occurred: "+
                textStatus, errorThrown
            );
        });
    });
});