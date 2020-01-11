<?php

    // resets database and adds one test item
    $items = array(
        'user_id' => 69,
        'item' => "test_item",
        'id_of_item' => uniqid('', true)
    );

    $data = array(
        "items" => array($items)
    );

    $encoded_data = json_encode($data);
    file_put_contents('userdata.json', $encoded_data);
?>