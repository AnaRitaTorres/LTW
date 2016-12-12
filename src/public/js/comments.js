$(document).ready(function(){
    $("#reviewContent").hide();
    $("#newReview").click(function(){
        $("#reviewContent").fadeToggle();
    });

    var request;
    $("#reviewForm").submit(function(event){
        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }

        var title = $("#reviewForm").find("#title").val();
        var body = $("#reviewForm").find("#body").val();
        var rating = $("#reviewForm").find("#rating").val();

        request = $.ajax({
            type : 'POST',
            url  : '/controllers/action_addReview.php',
            data : {
                "title": title,
                "body": body,
                "rating": rating,
            },
            datatype: "text",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            // Log a message to the console
            console.log("Hooray, it worked!");
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