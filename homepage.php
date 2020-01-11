<?php

    session_start();

    // includes users and userdata
    include("users.php");
    include("db2.php");

    // sets user id
    $uid = isset($_SESSION["user_id"]) ? $_SESSION["user_id"]:false;

    // adding items
    if(isset($_POST['add_item']) && $_POST['item'] != ''){
        $new_item = array(
            "user_id" => $uid,
            "item" => $_POST['item'],
            "id_of_item" => uniqid('', true)
        );
        if(store_data($data, $new_item)){
            header("Location: homepage.php");
        }
        else{
            $error = "Adding failed, item name too long.";
        }
        
    }

    // removing items
    if(isset($_POST['delete']) && $uid != 69){
        $to_remove = $_POST['hidden'];
        $id_of_item = $_POST['id_of_item'];
        remove_item($data, $to_remove, $uid, $id_of_item);
        header("Location: homepage.php");
    }

    // admin-authority item removal
    if(isset($_POST['delete']) && $uid == 69){
        $to_remove = $_POST['hidden'];
        $hidden_id = $_POST['hidden_id'];
        $id_of_item = $_POST['id_of_item'];
        remove_item($data, $to_remove, $hidden_id, $id_of_item);
        header("Location: homepage.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>On-line Shopping List</title>
    <link rel="stylesheet" type="text/css" href="css/homepage.css" media='screen'>
    <link rel="stylesheet" type="text/css" href="css/print.css" media='print'>

</head>
<body>
        <header id='header'>
        <h1 id='site_name'>
            Online shopping list by ruzicrom
        </h1>
        </header>

        <!-- top navigation bar -->
        <div class="topnav">
        <a class="active" href="homepage.php">Homepage</a>
        <a href="about.php">About</a>
        <?php if($uid) { ?>
        <a href="contact.php">Contact</a>
        <a href="logout.php" id="log_nav">Log Out</a>
        <?php } else {?>
        <a href="login.php" id="log_nav">Log In</a>
        <?php } ?>
        </div>

        <!-- user is logged in -->
        <?php if($uid) { ?>
        <div id='welcome'>
        <h2> Welcome to your shopping list, <?php 
        $user = get_user_by_id($uid, $users);
        echo htmlspecialchars($user['username']) ?>.</h2>
        </div>

        <!-- form for adding items -->
        <div class='form'>
        <form method='post' id="add_form">
        <label><b>Add Item:</b></label>
        <input type='text' required name='item' autofocus id="add_item_js" placeholder='Item to be added' autofocus>
        <input type='submit' value='Submit' name='add_item'>
        </form>
        <div>
        <?php echo isset($error) ? $error:"";?>
        </div>
        </div>

        <!-- user not logged in -->
        <?php } else { ?>
            <h1 id='not_logged_in'>
                Not logged in, to see your shopping list, please, <a href="login.php" id="link">log in.</a>
            </h1>
        <?php } ?>
    
        <?php

        // user logged in but not admin
        if($uid != 69 && $uid){
            echo "<div id='main'>";
            // left banner
            // images are 200x200 thumbnails of originals
            echo "<div id='ad_banner_left'>";
            echo "<a href='https://www.lidl-shop.cz/Slevy' target='_blank'><img src='photos/lidl.jpg' alt='lidl'></a>";
            echo "<a href='https://www.kaufland.cz/letak.html' target='_blank'><img src='photos/kaufland.jpg' alt='kaufland'></a>";
            echo "<a href='https://www.albert.cz/aktualni-letaky' target='_blank'><img src='photos/albert.jpg' alt='albert'></a>";
            echo "</div>";

            // right banner
            // images are 200x200 thumbnails of originals
            echo "<div id='ad_banner_right'>";
            echo "<a href='https://www.penny.cz/nabidky/prohlednout-letaky' target='_blank'><img src='photos/penny.jpg' alt='penny'></a>";
            echo "<a href='https://www.billa.cz/akcni-letaky' target='_blank'><img src='photos/billa.jpg' alt='billa'></a>";
            echo "<a href='https://itesco.cz/akcni-nabidky/letaky-a-katalogy/' target='_blank'><img src='photos/tesco.jpg' alt='tesco'></a>";
            echo "</div>";

            // shopping list
            echo "<div id='main_table'>";
            echo "<h1>";
            echo "<form method='post'>";
            echo "<table class='center'>";
            echo "<thead>";
            echo "<th id='item_name_label'>Item Name</th>";
            echo "</thead>";
            foreach($data['items'] as $item){
                if($item['user_id'] == $uid){
                    $item_name = htmlspecialchars($item['item']);
                    $id_of_item = htmlspecialchars($item['id_of_item']);

                    echo "<tr>";
                    echo "<td>$item_name</td>";
                    echo "<td><input type='submit' value='Remove' name='delete'><input type='hidden' value='";
                    echo htmlspecialchars($item['item']);
                    echo "' name='hidden'>";
                    echo "<input type=hidden value='";
                    echo $id_of_item;
                    echo "' name='id_of_item'>";
                    echo "</form></td>";
                    echo "</tr>";
                }
            }
            echo "</table>";
            echo "</h1>";
            echo "</div>";
            echo "</div>";

        }
        
        // admin logged in
        if($uid == 69){
            echo "<div id='main'>";
            // left banner
            // images are 200x200 thumbnails of originals
            echo "<div id='ad_banner_left'>";
            echo "<a href='https://www.lidl-shop.cz/Slevy' target='_blank'><img src='photos/lidl.jpg' alt='lidl'></a>";
            echo "<a href='https://www.kaufland.cz/letak.html' target='_blank'><img src='photos/kaufland.jpg' alt='kaufland'></a>";
            echo "<a href='https://www.albert.cz/aktualni-letaky' target='_blank'><img src='photos/albert.jpg' alt='albert'></a>";
            echo "</div>";

            // right banner
            // images are 200x200 thumbnails of originals
            echo "<div id='ad_banner_right'>";
            echo "<a href='https://www.penny.cz/nabidky/prohlednout-letaky' target='_blank'><img src='photos/penny.jpg' alt='penny'></a>";
            echo "<a href='https://www.billa.cz/akcni-letaky' target='_blank'><img src='photos/billa.jpg' alt='billa'></a>";
            echo "<a href='https://itesco.cz/akcni-nabidky/letaky-a-katalogy/' target='_blank'><img src='photos/tesco.jpg' alt='tesco'></a>";
            echo "</div>";

            // shopping list
            echo "<div id='main_table'>";
            echo "<h1>";
            echo "<table class='center'>";
            echo "<thead>";
            echo "<th id='item_name_label'>Item Name</th>";
            echo "<th>UID</th>";
            echo "</thead>";
            foreach($data['items'] as $item){
                $item_name = htmlspecialchars($item['item']);
                $user_id = htmlspecialchars($item['user_id']);
                $id_of_item = htmlspecialchars($item['id_of_item']);
                echo "<tr>";
                echo "<td>$item_name</td>";
                echo "<td>$user_id</td>";
                echo "<td><form method='post'><input type='submit' value='Remove' name='delete'></td><td><input type='hidden' value='";
                echo $item_name;
                echo "' name='hidden'>";
                echo "<input type='hidden' value='";
                echo $user_id;
                echo "' name='hidden_id'>";
                echo "<input type='hidden' value='";
                echo $id_of_item;
                echo "' name='id_of_item'>";
                echo "</form></td>";
                echo "</tr>";
            }
            echo "</table>";
            echo "</h1>";
            echo "</div>";
            echo "</div>";
            
        }
        ?>
        <!-- javascript for adding items only if user logged in -->
        <?php if($uid) 
            echo "<script type='text/javascript' src='javascript/add_item.js'></script>";
        ?>
    </body>
</html>