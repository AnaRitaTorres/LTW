$(document).ready(function(){

    var loginModal = document.getElementById('id01');
    var registerModal = document.getElementById('id02');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == loginModal) {
            loginModal.style.display = "none";
        }

        if (event.target == registerModal) {
            registerModal.style.display = "none";
        }
    }

    $("#loginForm").validate({
        rules:
        {
                password: {
                    required: true,
                },
                username: {
                    required: true,
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
            var username = $("#loginForm").find("#username").val();
            var password = $("#loginForm").find("#password").val();
            $.ajax({
                type : 'POST',
                url  : '/controllers/login.php',
                data : {
                    "username": username,
                    "password": password
                },
                datatype: "text",
                success: function(data){
                    window.location = "mainPage.php";
                }
            });
            return false;
        }

    $("#registerForm").validate({
        rules:
        {
            firstName: {
                required: true,
                maxlength: 32,
            },
            lastName: {
                required: true,
                maxlength: 32,
            },
            username: {
                required: true,
                maxlength: 32,
            },
            password: {
                required: true,
                minlength: 8,
            },
            cpassword: {
                minlength: 8,
                equalTo: $("#registerForm").find("#password"),

            },
            email: {
                email: true,
                required: true,
            }
        },
        messages:
        {
            password:{
                required: "Please enter your password",
            },
            username: "Please enter a valid username",
            email: "Please enter a valid email",
            lastName: "Please enter a valid last name",
            firstName: "Please enter a valid first name",
        },
        submitHandler: submitRegistration
    });

    function submitRegistration()
    {
        var firstName = $("#registerForm").find("#firstName").val();
        var lastName = $("#registerForm").find("#lastName").val();
        var username = $("#registerForm").find("#username").val();
        var email = $("#registerForm").find("#email").val();
        var password = $("#registerForm").find("#password").val();
        $.ajax({
            type : 'POST',
            url  : '/controllers/action_register.php',
            data : {
                "firstName": firstName,
                "lastName": lastName,
                "username": username,
                "email": email,
                "password": password
            },
            datatype: "text",
            success: function(data){
                window.location = "mainPage.php";
            }
        });
        return false;
    }
});