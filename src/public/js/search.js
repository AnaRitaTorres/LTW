window.addEventListener("load", function(){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    if(page == "restaurantsPage.php")
        setUp();
}, true);

function setUp() {
    $(document).on('click','#restaurant_name', restaurantChanged);
    $(document).on('keyup','#restaurant_name', restaurantChanged);
}

function restaurantChanged(event) {
    var text = event.target;

    var request = new XMLHttpRequest();
    request.addEventListener("load", restaurantsReceived, false);
    request.open("get", "/controllers/action_searchRestaurant.php?name=" + text.value, true);
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