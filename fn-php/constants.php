<?php

define("FILENAME","/home/roger/public_html/restaurant/files/users.txt");
define("FNPHP","/home/roger/public_html/restaurant/fn-php");
define("ONLYLETTERS",["options" => ['regexp' => "/^[a-zA-Z]+[\s|-]?[a-zA-Z]+[\s|-]?[a-zA-Z]+$/"]]);
define("PASSWORDVALIDATE",["options" => ['regexp' => "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/"]]);

// ROLES
define("ADMIN",["text" => "admin","code" => 0]);
define("STAFF",["text" => "staff","code" => 1]);
define("REGISTERED",["text" => "registered","code" =>2]);

