<?php

    // destroys session, logs user out
    session_start();
    session_unset();
    session_destroy();
    header("Location: homepage.php");
?>