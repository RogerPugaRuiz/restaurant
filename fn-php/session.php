<?php
namespace roger\session;
/**
 * File that contains the functions when user is login
 * @author Roger Puga
 * 23-11-2021
 */
use function roger\users\getUsers;
require_once "users.php";

/**
 * Method to get role in session
 * @param string $username
 * @param string $password
 * @return string role in session
 */
function getRoleInSession(string $username,string $password):string{
    $users = getUsers(FILENAME);
    foreach($users as $user){
        if ($user->getPassword() == $password && $user->getUsername() == $username){
            return $user->getRole();
            
        }
    }
    return null;
}
