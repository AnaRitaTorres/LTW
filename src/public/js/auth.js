$(document).ready(function(){

    // When the user clicks anywhere outside of the modal, close it
    $("#id01").bind( "clickoutside", function(){
        $(this).hide();
    });

    $("#id02").bind( "clickoutside", function(){
        $(this).hide();
    });


    $("#loginForm").validate({
        rules:
        {
                password: {
                    required: true,
                    minlength: 8
                },
                username: {
                    required: true,
                    password: true
                },
            },
            messages:
            {
                password:{
                    required: "Please enter your password",
                    minlength: "The password minimum length is 8"
                },
                username: "Please enter your username",
            },
            submitHandler: submitLogin
        });

        function submitLogin()
        {
            var data = $("#login").serialize();
            console.log(data);

            $.ajax({
                type : 'POST',
                url  : '/controllers/login.php',
                data : data,
            });
            return false;
        }

    $("#register").click(function() {
        var name = $("#register_name").val();
        var email = $("#register_email").val();
        var password = $("#register_password").val();
        var cpassword = $("#register_cpassword").val();
        if ((password.length) < 8) {
            alert("Password should atleast 8 character in length...!!!!!!");
        } else if (!(password).match(cpassword)) {
            alert("Your passwords don't match. Try again?");
        } else {
            $.post("register.php", {
                name1: name,
                email1: email,
                password1: password
            }, function(data) {
                if (data == 'You have Successfully Registered.....') {
                    $("form")[0].reset();
                }
                alert(data);
            });
        }
    });
});