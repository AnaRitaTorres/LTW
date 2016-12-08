<?php
    session_start();                         // starts the session
    $_SESSION['authenticated'] = false;
    session_destroy();

    header('Location: ../index.php');
?>
