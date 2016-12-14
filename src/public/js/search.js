// Setup the events only when document finished loading
window.addEventListener("load", function(){
    var path = window.location.pathname;
    var page = path.split("/").pop();
    if(page == "restaurantsPage.php")
        setUp();
}, true);

// Setup the events
function setUp() {
    $(document).on('click','#restaurant_name', restaurantChanged);
    $(document).on('keyup','#restaurant_name', restaurantChanged);
}

// Handler for change event on text input
function restaurantChanged(event) {
    var text = event.target;

    var request = new XMLHttpRequest();
    request.addEventListener("load", restaurantsReceived, false);
    request.open("get", "/controllers/action_searchRestaurant.php?name=" + text.value, true);
    request.send();
}

// Handler for ajax response received
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