$(document).ready(function(){
    $("#reviewContent").hide();
    $("#newReview").click(function(){
        $("#reviewContent").fadeToggle();
    });

    $("#hideBody").click(function(){
        var father = $(this).parent();
        var grandfather = father.parent();
        $(grandfather.find(".comment-body")).toggle();
        if($(grandfather.find(".comment-body")).css('display') == 'none') {
            $("#hideBody").text('[+]');
        }else $("#hideBody").text('[-]');
    });

    $(".comment-reply-link").click(function () {
        $("#id03").show();
        var id = parseInt($(this).attr('id').replace(/[^\d]/g, ''), 10);
        $("#replyForm").find("#review_id").attr("value", id);
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
            var commentId = "comment"+review["id"];
            var replyId = "reply"+review["id"];
            var username = user["username"];
            var body = review["body"];
            var date = review["date"];
            var points = review["likes"] - review["dislikes"];


            var div =   '<div class="commentBlock" id=' + commentId + '>' +
                        '    <div class="comment-head">' +
                        '        <a id="hideBody">[-]</a>' +
                        '        <cite class="fn">' + username + '</cite>' +
                        '        <a>' + points + '</a>' +
                        '        <a>' + date + '</a>' +
                        '    </div>' +
                        '    <div class="comment-body">' +
                        '        <p>' + body +'</p>' +
                        '    <div class="reply">' +
                        '    <a class="comment-reply-link" id='+ replyId +'>Reply</a>' +
                        '    </div>' +
                        '</div>';
            $('#comment').append(div);
            $('#reviewContent').hide();
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

    $("#replyForm").submit(function(event){
        // Prevent default posting of form - put here to work in case of errors
        event.preventDefault();

        // Abort any pending request
        if (request) {
            request.abort();
        }

        var body = $("#replyForm").find("#body").val();
        var user_id = $("#replyForm").find("#user_id").val();
        var review_id = $("#replyForm").find("#review_id").val();
        request = $.ajax({
            type : 'POST',
            url  : '/controllers/action_reply.php',
            data : {
                "body": body,
                "user_id": user_id,
                "review_id": review_id,
            },
            datatype: "text",
        });

        // Callback handler that will be called on success
        request.done(function (response, textStatus, jqXHR){
            var arr = JSON.parse(response);
            var comment = arr[0];
            var review = arr[1];
            var user = arr[2];
            var reply = "reply" + comment["id"];
            var username = user["username"];
            var body = comment["body"];

            var div =   '<div class="commentBlock" id=' + reply + '>' +
                '    <div class="comment-head">' +
                '        <a id="hideBody">[-]</a>' +
                '        <cite class="fn">' + username + '</cite>' +
                '        <p id="replyBody">'+ body + '</p>' +
                '    </div>' +
                '</div>';

            var divID = '#comment' + review["id"];
            $(divID).append(div);
            $("#replyForm").find("textarea#body").val("");
            $('#id03').hide();
            $(divID).find(".reply").hide();
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