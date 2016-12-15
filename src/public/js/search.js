$(document).ready(function() {

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

        var request = new XMLHttpRequest();
        request.addEventListener("load", restaurantsReceived, false);
        request.open("get", "/controllers/action_searchRestaurant.php?type=default&name=" + text.value, true);
        request.send();
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