<?php
    session_start();
    include("users.php");

    // setting user id 
    $uid = isset($_SESSION["user_id"]) ? $_SESSION["user_id"]:false;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>On-line Shopping List</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css">
</head>
<body>
        <header id='header'>
        <h1 id='site_name'>
            Online shopping list by ruzicrom
        </h1>
        </header>

        <!-- top navigation bar -->
        <div class="topnav">
        <a href="homepage.php">Homepage</a>
        <a class="active" href="about.php">About</a>
        <?php if($uid) { ?>
        <a href="contact.php">Contact</a>
        <a href="logout.php" id="log_nav">Log Out</a>
        <?php } else {?>
        <a href="login.php" id="log_nav">Log In</a>
        <?php } ?>
        </div>

        <div><h2>Semestral project for course B6B39ZWA 
        in the winter semester 2019/2020 by @ruzicrom</h2></div>
</body>
</html>