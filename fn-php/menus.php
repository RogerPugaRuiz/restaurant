<?php


require_once "users.php";
$menus = [
    "visitor" => [
        [
            "href" => "index.php",
            "name" => "Home",
        ],[
            "href" => "daymenu.php",
            "name" => "Day Menu",
        ],[
            "href" => "register.php",
            "name" => "Register",
        ],[
            "href" => "login.php",
            "name" => "Login",
        ]
    ],
    "registered" => [
        [
            "href" => "index.php",
            "name" => "Home",
        ],[
            "href" => "daymenu.php",
            "name" => "Day Menu",
        ],[
            "href" => "viewmenu.php",
            "name" => "View Menu",
        ],[
            "href" => "logout.php",
            "name" => "Logout",
        ]
    ],
    "staff" => [
        [
            "href" => "index.php",
            "name" => "Home",
        ],[
            "href" => "daymenu.php",
            "name" => "Day Menu",
        ],[
            "href" => "viewmenu.php",
            "name" => "View Menu",
        ],[
            "href" => "adminmenus.php",
            "name" => "Admin Menus",
        ],[
            "href" => "logout.php",
            "name" => "Logout",
        ]
    ],
    "admin" => [
        [
            "href" => "index.php",
            "name" => "Home",
        ],[
            "href" => "daymenu.php",
            "name" => "Day Menu",
        ],[
            "href" => "viewmenu.php",
            "name" => "View Menu",
        ],[
            "href" => "adminmenus.php",
            "name" => "Admin Menus",
        ],[
            "href" => "adminusers.php",
            "name" => "Admin Users",
        ],[
            "href" => "logout.php",
            "name" => "Logout",
        ]
    ],
];