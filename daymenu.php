<?php session_start(); 

use function roger\read_day_menu\read_day_menu;
use function roger\read_categories\read_categories;

require_once "fn-php/read_categories.php";
require_once "fn-php/read_day_menu.php";
require_once "fn-php/constants.php";

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <title>DAWBI-M07-Pt11</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/main.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Estonia&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@100&display=swap" rel="stylesheet"> 
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Wire+One&display=swap" rel="stylesheet"> 
    </head>
    <body>
    <div class="container-fluid">
        <?php include_once "topmenu.php";?>
        <div class="container">
            <div class="menus" >
                <h1>Day menu</h1>
                <?php
                try {
                    $categories = read_categories(CATEGORIES);
                    foreach ($categories as $category) {
                        $category = trim($category);
                        echo "<div class='category' id='$category'>";
                        
                        echo "<ul class='category-table'>";
                        echo "<h2>$category</h2>";
                        $menus_category = read_day_menu(DAYMENU, $category);

                        foreach ($menus_category as $menu) {
                            echo "<li>" . $menu["name"] . "</li>";
                        }
                        echo "</ul>";
                        echo "</div>";
                    }
                } catch (Exception $e) {
                    echo "<div class='error' style='color:red;font-size:20px'>Error on loading file</div>";
                }
                ?>
            </div>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>