$(document).ready(function() {

    var location;
    var restaurantsLocations = [];
    var restaurants;
    window.geocodeLocations = function () {
        var geocoder = new google.maps.Geocoder;

        var request = new XMLHttpRequest();
        request.addEventListener("load", locationDecoding, false);
        request.open("get", "/controllers/action_searchRestaurant.php?type=Location", true);
        request.send();

        function locationDecoding() {
            restaurants = JSON.parse(this.responseText);
            for(var rest in restaurants){
                location = restaurants[rest].location_id;
                geocodePlaceId(geocoder);
            }
        }

        function geocodePlaceId(geocoder) {
            geocoder.geocode({'placeId': location}, function(results, status) {
                    if (status === 'OK') {
                        if (results[0]) {
                            restaurantsLocations.push(results[0].formatted_address);
                        } else {
                            restaurantsLocations.push(-1);
                        }
                    } else {
                        restaurantsLocations.push(-1);
                    }
                }
            )
        };
    }

    function locationSearch(search) {
        var list = $("#suggestions");
        list.text("");
        var reg = new RegExp(search + ".*", "i");
        for (var rest in restaurantsLocations) {
            if(restaurantsLocations[rest].match(reg)) {
                var item = document.createElement("li");
                list.append(item);
                var link = document.createElement("a");
                link.innerHTML = restaurants[rest].name;
                link.setAttribute('href', "/restaurant.php?id=" + restaurants[rest].id);
                item.appendChild(link);
            }
        }
    }

    window.addEventListener("load", function () {
        var path = window.location.pathname;
        var page = path.split("/").pop();
        var substring = "editRestaurantPage.php";
        if (page == "restaurantsPage.php")
            setRestaurantSearch();
        else if (page.indexOf(substring) !== -1)
            setUserSearch();
    }, true);

    function setRestaurantSearch() {
        $(document).on('click', '#restaurant_name', restaurantChanged);
        $(document).on('keyup', '#restaurant_name', restaurantChanged);
    }

    function restaurantChanged(event) {
        var text = event.target;

        var searchType = "Location";
        if(searchType == "Location"){
            locationSearch(text.value);
        } else{
            var request = new XMLHttpRequest();
            request.addEventListener("load", restaurantsReceived, false);
            request.open("get", "/controllers/action_searchRestaurant.php?type=Location&name=" + text.value, true);
            request.send();
        }
    }

    function restaurantsReceived() {
        var restaurants = JSON.parse(this.responseText);
        var list = $("#suggestions");
        list.text("");

        // Add new suggestions
        for (var rest in restaurants) {
            var item = document.createElement("li");
            list.append(item);
            var link = document.createElement("a");
            link.innerHTML = restaurants[rest].name;
            link.setAttribute('href', "/restaurant.php?id=" + restaurants[rest].id);
            item.appendChild(link);
        }
    }

    function setUserSearch() {
        $(document).on('keyup', '#username', userChanged);
    }

    function userChanged(event) {
        var text = event.target;

        var request = new XMLHttpRequest();
        request.addEventListener("load", usersReceived, false);
        request.open("get", "/controllers/getUsers.php?name=" + text.value, true);
        request.send();
    }

    function usersReceived() {
        var users = JSON.parse(this.responseText);
        console.log(users);
        var list = $("#users");
        list.empty();

        for (var itr in users) {
            $('<option>').val(users[itr].username).text(users[itr].username).appendTo('#users');
        }
    }

    var request;
    $("#shareOwnership").submit(function (event) {
        event.preventDefault();

        if (request) {
            request.abort();
        }

        var username = $("#shareOwnership").find("#username").val();
        var restaurant_id = $("#shareOwnership").find("#restaurant_id").val();

        request = $.ajax({
            type: 'POST',
            url: '/controllers/action_shareOwnership.php',
            data: {
                "restaurant_id": restaurant_id,
                "username": username,
            },
            datatype: "text",
        });

        request.done(function (response, textStatus, jqXHR) {
            $("#shareOwnership").find(".error").hide();
            var div = '<div class="error">' + response + '</div>';
            $("#shareOwnership").append(div);
        });

        request.fail(function (jqXHR, textStatus, errorThrown) {
            console.error(
                "The following error occurred: " +
                textStatus, errorThrown
            );
        });
    });

});