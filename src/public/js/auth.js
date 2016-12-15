$(document).ready(function(){

    $(document).on('click','.loginbtn',function(){
       $("#id01").show();
    });

    $(document).on('click','#loginClose',function(){
        $("#id01").hide();
    });

    $(document).on('click','#loginCancel',function(){
        $("#id01").hide();
    });

    $(document).on('click','.registerbtn',function(){
        $("#id02").show();
    });

    $(document).on('click','#registerClose',function(){
        $("#id02").hide();
    });

    $(document).on('click','#registerCancel',function(){
        $("#id02").hide();
    });

    $(document).on('click','#notRegistered',function(){
        $("#id01").hide();
        $("#id02").show();
    });

    window.onclick = function(event) {
        if (event.target == $("#id01")[0]) {
            $("#id01").hide();
        }
        if (event.target == $("#id02")[0]) {
            $("#id02").hide();
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
                required: "Please Enter Your Password.",
                minlength: "The Password Minimum Length is 8."
            },
            username: "Please Enter Your Username.",
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
                $("#loginForm").find(".error").hide();
                var div ='<div class="error">' + data + '</div>';
                if(data == "Wrong password!" || data == "Invalid username!")
                    $("#loginForm").children(".container").first().append(div);
                else{
                    window.location = "mainPage.php";
                }
            },
            error: function(data){
                alert(data);
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
                required: "Please Enter Your Password.",
            },
            username: "Please Enter a Valid Username.",
            email: "Please Enter a Valid Email.",
            lastName: "Please Enter a Valid Last Name.",
            firstName: "Please Enter a Valid First Name.",
        },
        submitHandler: submitRegistration
    });

    function submitRegistration() {
        var firstName = $("#registerForm").find("#firstName").val();
        var lastName = $("#registerForm").find("#lastName").val();
        var username = $("#registerForm").find("#username").val();
        var email = $("#registerForm").find("#email").val();
        var password = $("#registerForm").find("#password").val();
        var gender = $('input[name=gender]:checked', '#registerForm').val();

        $.ajax({
            type: 'POST',
            url: '/controllers/action_register.php',
            data: {
                "firstName": firstName,
                "lastName": lastName,
                "username": username,
                "email": email,
                "password": password,
                "gender" : gender
            },
            datatype: "text",
            success: function (data) {
                $("#registerForm").find(".error").hide();
                var div = '<div class="error">' + data + '</div>';
                if (data == "Invalid username!" 
                    || data == "Email address already in use!" 
                    || data == "Invalid first name!"
                    || data == "Invalid last name!"
                    || data == "Invalid username!")
                    $("#registerForm").children(".container").first().append(div);
                else {
                    window.location = "mainPage.php";
                }
            },
            error: function (data) {
                alert(data);
            }
        });
        return false;
    }

    $("#editUserForm").validate({
        rules:
        {
            firstName: {
                maxlength: 32,
            },
            lastName: {
                maxlength: 32,
            },
            password: {
                minlength: 8,
            },
            password2: {
                minlength: 8,
                equalTo: $("#editUserForm").find("#password"),

            },
            old_password:{
                required: true,
                minlength: 8,
            }
        },
        messages:
        {
            old_password:{
                required: "Please Enter Your Password.",
            },
            lastName: "Please Enter a Valid Last Name.",
            firstName: "Please Enter a Valid First Name.",
        },
        submitHandler: submitUpdate
    });

    function submitUpdate() {
        var user_id =  $("#editUserForm").find("#user_id").val();
        var firstName = $("#editUserForm").find("#firstName").val();
        var lastName = $("#editUserForm").find("#lastName").val();
        var oldPass = $("#editUserForm").find("#old_password").val();
        var age = $("#editUserForm").find("#age").val();
        var newPass = $("#editUserForm").find("#password").val();
        var newPassC = $("#editUserForm").find("#password2").val();
        $.ajax({
            type: 'POST',
            url: '/controllers/action_updateUser.php',
            data: {
                "firstName": firstName,
                "lastName": lastName,
                "oldPass": oldPass,
                "user_id": user_id,
                "age": age,
                "newPass": newPass,
                "newPassC": newPassC,
            },
            datatype: "text",
            success: function (data) {
                $(".user").find(".error").hide();
                var div = '<div class="error">' + data + '</div>';
                if (data == "Wrong password!" || data == "Invalid first name!" || data == "Invalid last name!")
                    $(".user").append(div);
                else {
                    window.location = "mainPage.php";
                }
            },
            error: function (data) {
                alert(data);
            }
        });
        return false;
    }
});