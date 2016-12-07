<?php
session_start();

if (!$_SESSION['authenticated']) {
    $_SESSION['flash_error'] = "Please Sign In";
    header("Location: /login_form.php");
    exit;
}
?>
