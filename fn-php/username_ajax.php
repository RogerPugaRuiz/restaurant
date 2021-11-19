<?php
use function roger\users\getUsers;
use function roger\users\ifUserExistsIn;
require_once "users.php";
require_once "constants.php";

$data = filter_var(file_get_contents("php://input"),FILTER_SANITIZE_STRING);
$users = getUsers(FILENAME);
if (ifUserExistsIn($users, $data)) {
    echo 1;
}else{
    echo 0;
}
