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
        <a href="about.php">About</a>
        <a class="active" href="contact.php">Contact</a>
        <?php if($uid) { ?>
        <a href="logout.php" id="log_nav">Log Out</a>
        <?php } else {?>
        <a href="login.php" id="log_nav">Log In</a>
        <?php } ?>
        </div>
        <?php if($uid) { ?>
        <div>
            <h2>If you have any questions regarding this website, please, contact me at <a id="link" href='mailto:ruzicrom@fel.cvut.cz?subject=ZWA'>ruzicrom@fel.cvut.cz</a></h2>
        </div>
        <?php } else {?>
        <div>
            <h2>Not logged in, to see contact info, <a href="login.php" id="link">log in.</a></h2>
        </div>
        <?php } ?>
</body>
</html>