<!DOCTYPE html>
<html lang="es">

<head>
    <title>Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="css/main.css">
</head>

<body>

    <?php
    use \roger\new_user as new_user;

use function roger\message\getMessage;

require_once "fn-php/new_user.php";
    require_once "message.php";
    
    if (filter_has_var(INPUT_POST, "registersubmit")) {
        $username = filter_input(INPUT_POST,"username",FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST,"password",FILTER_SANITIZE_STRING);
        $name = filter_input(INPUT_POST,"name",FILTER_SANITIZE_STRING);
        $surname = filter_input(INPUT_POST,"surname",FILTER_SANITIZE_STRING);

        if (filter_var($name,FILTER_VALIDATE_REGEXP,ONLYLETTERS) &&
            filter_var($surname,FILTER_VALIDATE_REGEXP,ONLYLETTERS)){
                $path = "files/" . FILENAME;
                try{
                    $is_new_user = new_user\append($username,$password,$name,$surname,$path);
                    
                }catch (File_not_found_exception $ex){
                    getMessage("FILE ERROR","File not found");
                }catch (File_is_not_writable $ex){
                    getMessage("FILE ERROR", "File is not writable, please check permissions");
                }      
        } 
    }
    if (filter_has_var(INPUT_POST,"cancel")){
        header("Location: index.php");
    }
    ?>
    <div class="block-content">
    </div>
    <div class="container-fluid">
        <h2>Registration form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" placeholder="Enter username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
            </div>
            <div class="form-group">
                <label for="surname">Surname:</label>
                <input type="text" class="form-control" id="surname" placeholder="Enter surname" name="surname">
            </div>
            <button type="submit" name="registersubmit" class="btn btn-default">Submit</button>
            <button name="cancel" class="btn btn-default">Cancel</button>
        </form>
    </div>
    <script src="js/close_message.js"></script>
</body>

</html>