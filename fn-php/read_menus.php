<?php
/**
 * File that read and manipulate the menus from the view menu.
 * @author Roger Puga
 * 29-11-2021
 */
namespace roger\read_menus;

use File_not_found_exception;
use File_is_not_readable;

require_once "exceptions/file_is_not_readable.php";
require_once "exceptions/file_not_found.php";
/**
 * Function that reads the file menu.txt
 * @author Roger Puga
 * @param string $path directory path to read
 * @throws File_not_found_exception 
 * @throws File_is_not_writable;
 * @return array $view_menu
 */
function read_menus(string $path, string $category):array {
    $view_menu = [];
    if (file_exists($path) && is_readable($path)) {
        $file = fopen($path, 'r');
        while ($line = fgets($file)) {
            $element = explode(";",$line);
            if (count($element) == 4){
                $new_menu = [
                    "id"=>$element[0],
                    "category"=>$element[1],
                    "name"=>$element[2],
                    "price"=>$element[3]
                ];

                if ($new_menu["category"] == $category){
                    $view_menu[]=$new_menu;
                }
                
            }
        }
    }else{
        if (!file_exists($path)){
            throw new File_not_found_exception("Error on loading file");
        }
        if (!is_readable($path)){
            throw new File_is_not_readable("Error on loading file");
        }
    }
    return $view_menu; 
}
?>