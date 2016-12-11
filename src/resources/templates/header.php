<!DOCTYPE html>
<html>
    <head>
        <title>Restaurant Reviewer</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rock+Salt">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Work+Sans">
        <link rel="stylesheet" href="public/css/style.css">
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.15.0/jquery.validate.min.js"></script>
        <script src="http://jqueryvalidation.org/files/dist/additional-methods.min.js"></script>
        <script src="../../public/js/search.js"></script>
        <script src="../../public/js/map.js"></script>
        <script type="text/javascript" src="../../public/js/auth.js"></script>
    </head>
    <body>
        <header>
            <h1>Restaurant Reviewer</h1>
        </header>
        <?php 
        if(!isset($_SESSION))
        {
            session_start();
        }
        if (!isset($_SESSION['authenticated'])) :{
            include('resources/templates/login_form.php');
            include('resources/templates/register_form.php');
        }
        else:?>
        <input type="button" onclick="location.href='/controllers/logout.php'" value="Logout" />
        <?php endif; ?>
        <div id="wrapper">

