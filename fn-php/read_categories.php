<?php
/**
 * File to read the file categories
 * @author Roger Puga
 * 23-11-2021
 */

 namespace roger\read_categories;

 /**
  * Function to read the file categories
  * @param string $path path to read the file categories
  * @return array list of categories
  */
 function read_categories(string $path):array {
    $categories = [];
    if (file_exists($path) && is_readable($path)) {
        $file = fopen($path, 'r');
        while ($line = fgets($file)){
            $categories[] = $line;
        }
    }
    return $categories;
 }