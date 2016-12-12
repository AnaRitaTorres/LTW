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
        var restaurant_id = $("#reviewForm").find("#restaurant_id").val();

        request = $.ajax({
            type : 'POST',
            url  : '/controllers/action_addReview.php',
            data : {
                "restaurant_id": restaurant_id,
                "title": title,
                "body": body,
                "rating": rating,
            },
            datatype: "text",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            var arr = JSON.parse(response);
            var review = arr[0];
            var user = arr[1];
            var commentId = "comment" + review["id"];
            var username = user["username"];
            var body = review["body"];
            var date = review["date"];


            var div =   '<div class="comment-body" id=' + commentId + '>' +
                        '    <div class="comment-author">' +
                        '        <cite class="fn">' + username + '</cite>' +
                        '        <span class="says">says:</span>' +
                        '    </div>' +
                        '    <p>' + body + '</p>' +
                        '    <div class="commentData">' +
                        '    <a>' + date + '</a>' +
                        '    </div>' +
                        '    <div class="reply">' +
                        '    <a rel="nofollow" class="comment-reply-link" href="/bigurlagain">Reply</a>' +
                        '    </div>' +
                        '</div>';
            $('#comment').append(div);
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