<?php

use function roger\session\getRoleInSession;
use function roger\read_menus\read_Menus;
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
    </head>
    <body>
    <div class="container-fluid">
        <?php include_once "topmenu.php";?>
        <div class="container">
            <h2>View menus</h2>
            <div class="menus" >
                <?php var_dump(read_Menus(MENU)); ?>
            </div>
        </div>
        <?php include_once "footer.php";?>
    </div>
    </body>
</html>