<?php
    session_start();                         // starts the session
    $_SESSION['loggedin'] = false;
    session_destroy();

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
