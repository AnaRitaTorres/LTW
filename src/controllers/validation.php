<?php
session_start();

if (!$_SESSION['authenticated']) {
    $_SESSION['flash_error'] = "Please sign in";
    header("Location: /userAuthPage.php");
    exit;
}