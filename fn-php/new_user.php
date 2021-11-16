<?php

namespace roger\new_user;

use Exception;
use File_is_not_writable;
use File_not_found_exception;

require_once "constants.php";
require_once "exceptions/file_not_found.php";
require_once "exceptions/file_is_not_writable.php";


/**
 * Method to insert a new user into file
 * @param $username
 * @param $password
 * @param $name
 * @param $surname
 * @param $file_name
 * @return true if successful
 * @throws File_not_found_exception,
 */
function append(string $username, string $password, string $name, string $surname, $file_name)
{
    $data = $username . ";" . $password . ";" . REGISTERED["text"] . ";" . $name . ";" . $surname . "\n";
    if (file_exists($file_name) && !is_dir($file_name)) {
        
        if (is_writable($file_name)) {
            $file = fopen($file_name, 'a');
            fwrite($file, $data);
            fclose($file);
            return true;
        }else{
            throw new File_is_not_writable("File " . $file_name . " exists and cannot be written");
        }

    } else {
        throw new File_not_found_exception("File " . $file_name . " not found");
    }
}

// echo append("r23", "1234", "roge r", "puga ruiz", "hola");


    // if (filter_var($name,FILTER_VALIDATE_REGEXP,ONLYLETTERS) &&
    //     filter_var($surname,FILTER_VALIDATE_REGEXP,ONLYLETTERS)){
    //         $data = $username . ";" . $password . ";" . REGISTERED["text"] . ";" . $name . ";" . $surname . "\n";
    //         if (file_exists($relative_path) && !is_dir($relative_path)){
    //             $file = fopen($relative_path, 'a');
    //             fwrite($file,$data);
    //             fclose($file);
    //             echo "archivo" . $relative_path;
                
    //         }else{
    //             $file = fopen($relative_path, "w");
    //             fwrite($file,$data);
    //             fclose($file);
    //         }
    //         return true;
    // }else{
    //     throw new Exception("file not found: " . $relative_path);
    // }