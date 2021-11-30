<?php
session_start();

use function roger\session\getRoleInSession;
require_once "fn-php/session.php";
require_once "fn-php/user.php";

if (isset($_SESSION["user"])) {
    // all registered users can see this page
    $user = unserialize($_SESSION["user"]);
    $role = $user->getRole();
    if (!($role == ADMIN["text"] || $role == STAFF["text"])){
        header("Location:index.php");
    }
} else {
    header("Location:index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin menus</title>
    <link href="css/main.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
    <div class="container-fluid">
        <?php require_once "topmenu.php" ?>
        <h1>Admin menus </h1>
    </div>
</body>
</html>