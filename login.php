<?php
    include("users.php");

    // server login authorization copied from seminar
    if(isset(($_POST["login"]))){
        $username = isset($_POST["username"]) ? $_POST["username"]:false;
        $password = isset($_POST["password"]) ? $_POST["password"]:false;
    
        if($username && $password){
            $user = get_user_by_username($username, $users);
            if($user){
                if(password_verify($password, $user["passwordhash"])){
                    session_start();
                    $_SESSION["user_id"] = $user["id"];
                    header("Location: homepage.php");
                }
                else{
                    $error = "Wrong login!";
                }
            }else{
                $error = "Wrong login!";
            }
        }else{
            $error = "Wrong login!";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Online Shopping List</title>
    <link rel="stylesheet" type="text/css" href="css/login.css">
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
        <a class="active" id='log_nav' href="login.php">Log In</a>
    </div>

    <!-- shopping basket image, full size -->
    <img src='photos/fruit-veg-shopping-basket-transparent-background.png' alt='shopping basket' class='center'>
    
    <!-- login form -->
    <form method="post" id="login_form">
        <div id="username_box">
            <label>
                Username:
                <input required type="text" id="username" name="username" value="<?php echo isset($error) ? htmlspecialchars($username):"";?>">
            </label>
        </div>
        <div id="password_box">
            <label>
                Password:
                <input required type="password" id="password" name="password">
            </label>
        </div>
        <div id="login_button">
        <input type="submit" value="Login" name="login" id="login_button">
        </div>
        <div>
        <?php echo isset($error) ? $error:"";?>
        </div>
    </form>
    <!-- javascript for checking login input -->
    <script type="text/javascript" src="javascript/login.js"></script>
</body>
</html>