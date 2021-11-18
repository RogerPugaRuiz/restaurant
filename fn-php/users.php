<?php

namespace roger\users;

use roger\user as user;
require_once "user.php";


/**
 * Method to read the users file and create a array of users
 * @param string $path relative path
 */
function getUsers(string $path):array{
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

/**
 * Method to check if a user exists in the database
 * @param array $users
 * @param $user
 * @return true if the user exists
 */
function ifUserExistsIn(array $users, $user):bool{
    $result = false;
    foreach($users as $user){
        if ($user->compareTo($user)){
            $result = true;
        }
    }
    return $result;
}

/**
 * Method to validate a user in the users.txt
 * @param array $users
 * @param string $user
 * @param string $password
 * @return User if the user is valid or false if it is not valid
 */
function validateUser(array $users, string $username, string $password){
    foreach($users as $user){
        if ($user->validate($username, $password)){
            return $user;
        }
    }
    return false;
}