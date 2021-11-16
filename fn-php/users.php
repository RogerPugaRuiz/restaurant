<?php
use roger\user as user;
require_once "user.php";
require_once "constants.php";


/**
 * Method to read the users file and create a array of users
 */
function getUsers(){
    $path = "../files/" . FILENAME;
    $users = [];
    if ($file = fopen($path, "r")){
        while($row = fgets($file)){
            $element = explode(";", $row);
            if (count($element) == 5){
                $user = new user\User($element[0], $element[1], $element[2], $element[3],$element[4]);
                $users[] = $user;
            }
        }
    }
    return $users;
}