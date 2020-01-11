<?php
    // static user array, users have to be added manually, could be modified for registration 
    // hashing passwords using default password_hash function
    // manually chosen IDs could be swapped with uniqid() function
    $users = array(
        array(
            "id" => 69,
            "username" => "admin",
            "passwordhash" => password_hash('admin1234', PASSWORD_DEFAULT)
        ),
        array(
            "id" => 1,
            "username" => "basicuser",
            "passwordhash" => password_hash('basicuser123', PASSWORD_DEFAULT)
        ),
        array(
            "id" => 666,
            "username" => "alenka",
            "passwordhash" => password_hash('alenka666', PASSWORD_DEFAULT)
        ),
        array(
            "id" => 2,
            "username" => "basicuser2",
            "passwordhash" => password_hash('basicuser1234', PASSWORD_DEFAULT)
        ),
        );

    // function copied from seminar, self documenting 
    function get_user_by_username($username, $users){
        foreach($users as $user){
            if($user["username"] == $username){
                return $user;
            }
        }
        return false;
    }

    // function copied from seminar, self documenting 
    function get_user_by_id($uid, $users){
        foreach($users as $user){
            if($user["id"] == $uid){
                return $user;
            }
        }
        return false;
    }
?>