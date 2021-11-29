<?php
/**
 * File that contain the constants
 * @author Roger Puga
 * 23-11-2021
 */

// path
define("FILENAME","/home/roger/public_html/restaurant/files/users.txt");
define("MENU","/home/roger/public_html/restaurant/files/menu.txt");
define("CATEGORIES","/home/roger/public_html/restaurant/files/categories.txt");
define("DAYMENU","/home/roger/public_html/restaurant/files/daymenu.txt");

// regexp
define("ONLYLETTERS",["options" => ['regexp' => "/^[a-zA-Z]+[\s|-]?[a-zA-Z]+[\s|-]?[a-zA-Z]+$/"]]);
define("PASSWORDVALIDATE",["options" => ['regexp' => "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/"]]);

// ROLES
define("ADMIN",["text" => "admin","code" => 0]);
define("STAFF",["text" => "staff","code" => 1]);
define("REGISTERED",["text" => "registered","code" =>2]);

