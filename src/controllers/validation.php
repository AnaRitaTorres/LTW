<?php
session_start();
if (!$_SESSION['authenticated']) {
    $_SESSION['flash_error'] = "Please sign in";
    header("Location: /views/userAuthPage.php");
    exit;
}