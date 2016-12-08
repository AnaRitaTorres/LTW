<!DOCTYPE html>
<html>
<head>
    <title>Restaurant Reviewer</title>
    <link rel="stylesheet" href="/public/css/stylesheet.css">
    <script src="/public/js/search.js"></script>
</head>
<body>
<header>
    <h1>Restaurant Reviewer</h1>
</header>
<nav>
    <?php
    if (isset($_SESSION['username']))
        include ('resources/templates/logout_form.php');
    else
        include ('resources/templates/login_form.php');
    ?>
</nav>
