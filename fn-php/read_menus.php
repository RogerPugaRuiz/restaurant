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
    }
    return $view_menu; 
}
?>