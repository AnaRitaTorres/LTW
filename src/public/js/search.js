// Setup the events only when document finished loading
window.addEventListener("load", function(){
    setUp();
}, true);

// Setup the events
function setUp() {
    var text = document.getElementById("restaurant_name");
    console.log(text);
    text.addEventListener("keyup", restaurantChanged, false);
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
    var list = document.getElementById("suggestions");
    list.innerHTML = ""; // Clean current countries

    // Add new suggestions
    for (var rest in restaurants) {
        var item = document.createElement("li");
        list.appendChild(item);
        var link = document.createElement("a");
        link.innerHTML = restaurants[rest].name;
        link.setAttribute('href', "/restaurant.php?id=" + restaurants[rest].id);
        item.appendChild(link);
    }
}