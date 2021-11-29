<?php
/**
 * File to read the file categories
 * @author Roger Puga
 * 29-11-2021
 */

 namespace roger\read_categories;

 use File_not_found_exception;
 use File_is_not_readable;

 require_once "exceptions/file_is_not_readable.php";
 require_once "exceptions/file_not_found.php";
 /**
  * Function to read the file categories
  * @param string $path path to read the file categories
  * @throws File_not_found_exception
  * @throws File_is_not_writable;
  * @return array list of categories
  */
 function read_categories(string $path):array
 {
     $categories = [];
     if (file_exists($path) && is_readable($path)) {
         $file = fopen($path, 'r');
         while ($line = fgets($file)) {
             $categories[] = $line;
         }
     } else {
         if (!file_exists($path)) {
             throw new File_not_found_exception("Error on loading file");
         }
         if (!is_readable($path)) {
             throw new File_is_not_readable("Error on loading file");
         }
     }
     return $categories;
 }
