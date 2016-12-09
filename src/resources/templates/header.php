<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Reviewer</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rock+Salt">
        <link rel="stylesheet" href="../../public/css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <script src="../../public/js/search.js"></script>
        <script type="text/javascript" src="../../public/js/auth.js"></script>
    </head>
    <body>
        <header>
            <h1>Restaurant Reviewer</h1>
        </header>

        <?php
        session_start();
        if (!$_SESSION['authenticated']) {
            include('resources/templates/login_form.php');
            include('resources/templates/register_form.php');
        }
        ?>

