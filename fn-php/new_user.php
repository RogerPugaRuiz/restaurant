<?php

namespace roger\new_user;

use Exception;
use File_is_not_writable;
use File_not_found_exception;
use roger\users as users;


require_once "constants.php";
require_once "exceptions/file_not_found.php";
require_once "exceptions/file_is_not_writable.php";
require_once "fn-php/users.php";


/**
 * Method to insert a new user into file
 * @param $username
 * @param $password
 * @param $name
 * @param $surname
 * @param $file_name
 * @return true if successful
 * @throws File_not_found_exception
 * @throws File_is_not_writable
 */
function append(string $username, string $password, string $name, string $surname, $file_name)
{
    $data = $username . ";" . $password . ";" . REGISTERED["text"] . ";" . $name . ";" . $surname . "\n";
    if (file_exists($file_name) && ($file_name)) {
        
        if (is_writable($file_name)) {
            $file = fopen($file_name, 'a');
            $users = users\getUsers(FILENAME);
            if (!users\ifUserExistsIn($users, $username)){
                fwrite($file, $data);
                fclose($file);
                return true;
            }else{
                fclose($file);
                return false;
            }

        }else{
            throw new File_is_not_writable("File " . $file_name . " exists and cannot be written");
        }

    } else {
        throw new File_not_found_exception("File " . $file_name . " not found");
    }
}