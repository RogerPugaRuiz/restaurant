<?php
/**
 * File that read and manipulate the menus from the view menu.
 * @author Roger Puga
 * 23-11-2021
 */
namespace roger\read_menus;

/**
 * Function that reads the file menu.txt
 * @author Roger Puga
 * @param string $path directory path to read
 * @return array $view_menu
 */
function read_Menus(string $path, string $category):array {
    $view_menu = [];
    $header = ["ID","Category", "Name", "Price"];
    $view_menu["header"] = $header; 
    if (file_exists($path) && is_readable($path)) {
        $file = fopen($path, 'r');
        while ($line = fgets($file)) {
            $element = explode(";",$line);
            if ($element[1] == $category) {
                $view_menu[] = $element;
            }
        }
    }
    return $view_menu; 
}
?>