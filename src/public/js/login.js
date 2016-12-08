$(document).ready(function(){
    $("#login").click(function(){
        var username = $("#name").val();
        var password = $("#password").val();

        if( username == ''){
            $('input[type="text"], #name').css("border","2px solid red", "box-shadow","0 0 3px red");
        } else if(password == ''){
            $('input[type="password"]').css("border","2px solid red", "box-shadow","0 0 3px red");
        }else {
            $.post("/controllers/login.php", {name: username, password: password},
                function (data) {
                    if (data == 'Invalid username or password') {
                        window.location.href = "index.php";
                    }
                });
        }
    });
});