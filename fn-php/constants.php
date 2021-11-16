<?php
define("FILENAME","users.txt");
define("ONLYLETTERS",["options" => ['regexp' => "/^[a-zA-Z]+[\s|-]?[a-zA-Z]+[\s|-]?[a-zA-Z]+$/"]]);


// ROLES
define("ADMIN",["text" => "admin","code" => 0]);
define("STAFF",["text" => "staff","code" => 1]);
define("REGISTERED",["text" => "registered","code" =>2]);
