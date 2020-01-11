<?php

    // saving data to and loading data from json file
    $filename = "userdata.json";

    $data = file_get_contents($filename);
    if($data == NULL){
        include("db.php");
    }

    $data = json_decode($data, JSON_OBJECT_AS_ARRAY);

    // stores new item as encoded data into json file
    function store_data($data, $new_item){
        $item['item'] = preg_replace('/\s+/', '', $new_item['item']);
        if(strlen($item['item']) >= 1 && strlen($item['item']) < 60){
            array_push($data['items'], $new_item);
            file_put_contents('userdata.json', json_encode($data));
            return true;
        }
        else{
            return false;
        }
    }

    // removes item from json file using item name and user id
    function remove_item($data, $to_remove, $uid, $uniqid){
        $removed = false;
        $item = $data['items'];
        for($i = 0; $i < count($item); $i++){
            if($item[$i]['item'] == $to_remove && $item[$i]['user_id'] == $uid && $item[$i]['id_of_item'] == $uniqid){
                array_splice($item, $i, 1);
                $removed = true;
            }
            if($removed){
                break;
            }
        }
        $new_data = array(
            'items' => $item
        );
        $new_data = json_encode($new_data);
        file_put_contents('userdata.json', $new_data);
    }
?>