<?php

use function roger\session\getRoleInSession;
use function roger\read_menus\read_menus;
use function roger\read_categories\read_categories;

require_once "fn-php/read_menus.php";
require_once "fn-php/session.php";
require_once "fn-php/constants.php";
require_once "fn-php/read_categories.php";

    session_start();
    if (isset($_SESSION["name"]) && isset($_SESSION["password"])){
        // all registered users can see this page
        // $role = getRoleInSession($_SESSION["name"], $_SESSION["password"]);
    }else{
        header("Location:index.php");
    }
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
        <link rel="preconnect" href="https://fonts.googleapis.com">
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
                <h1>fancy savor</h1>
                <?php 
                $categories = read_categories(CATEGORIES);
                foreach ($categories as $category){
                    $category = trim($category);
                    echo "<div class='category' id='$category'>";
                    
                    echo "<table class='category-table'>";
                    echo "<tr><th><h2>$category</h2><th></tr>";
                    $menus_category = read_menus(MENU,$category);
                    foreach ($menus_category as $menu){
                        echo "<tr>";
                        echo "<td>" . $menu["name"] . "</td>";
                        echo "<td>" . $menu["price"] . "€</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                }?>
            </div>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>