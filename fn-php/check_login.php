<?php
namespace roger\check_login;

use LoginException;
use roger\users as users;

require_once "users.php";
require_once "constants.php";

/**
 * Method to login a user
 * @param string $username
 * @param string $password
 * @param string $path
 * @return User user object
 */
function login(string $username, string $password){
    $users = users\getUsers(FILENAME);
    $user = users\validateUser($users,$username,$password);
    return $user;
}
