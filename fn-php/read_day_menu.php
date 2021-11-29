<?php
/**
 * File that read and manipulate the day menu.
 * @author Roger Puga
 * 29-11-2021
 */



 namespace roger\read_day_menu;

 use File_not_found_exception;
 use File_is_not_readable;

 require_once "exceptions/file_is_not_readable.php";
 require_once "exceptions/file_not_found.php";

 
function read_day_menu(string $path, string $category):array
{
    $day_menu_list = [];
    if (file_exists($path) && is_readable($path)) {
        $file = fopen($path, "r");
        while ($line = fgets($file)) {
            $elements = explode(";", $line);
            if (count($elements) == 3) {
                $new_menu = [
                    "id"=>$elements[0],
                    "category"=>$elements[1],
                    "name"=>$elements[2],
                ];

                if ($new_menu["category"] == $category){
                    $day_menu_list[]=$new_menu;
                }
            }
        }
    } else {
        if (!file_exists($path)) {
            throw new File_not_found_exception("Error on loading file");
        }
        if (!is_readable($path)) {
            throw new File_is_not_readable("Error on loading file");
        }
    }
    return $day_menu_list; 
}