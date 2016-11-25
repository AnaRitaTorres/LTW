<?php
  session_start();
  //TODO                     // starts the session
  include_once(''); // connects to the database
  include_once('');      // loads the functions responsible for the users table

  if (userExists($db, $_POST['username'], $_POST['password'])){  // test if user exists
    $_SESSION['username'] = $_POST['username'];            // store the username
    $_SESSION['loggedin'] = true;
    echo("User logged in");
  }
  else{
      $_SESSION['loggedin'] = false;
      session_destroy();
  }

  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
