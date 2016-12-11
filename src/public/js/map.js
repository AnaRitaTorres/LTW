$(document).ready(function(){
    var map;
    var markers = [];
    var lat;
    var lng;
    var geocoder;
    var infowindow;
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
                        console.log(results[1].place_id);
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
});