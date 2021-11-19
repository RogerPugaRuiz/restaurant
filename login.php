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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
</head>

<body>
    <?php
    session_start();
    use function roger\check_login\login;
    use roger\user\User;

    use function roger\message\getMessage;

    require_once "fn-php/user.php";
    require_once "fn-php/check_login.php";
    require_once "message.php";

    $message_error = "";

    if (filter_has_var(INPUT_COOKIE,"name") && filter_has_var(INPUT_COOKIE,"password")) {
        $username = filter_input(INPUT_COOKIE,"name");
        $password = filter_input(INPUT_COOKIE,"password");
    }else{
        $username = "";
        $password = "";
    
    }

    if (filter_has_var(INPUT_POST, "loginsubmit")) {
        $username = filter_input(INPUT_POST, "username", FILTER_SANITIZE_STRING);
        $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);

        if (filter_has_var(INPUT_POST, "remember")){
            setcookie(name:"name", value:$username,secure: true);
            setcookie(name:"password",value:$password,secure:true);
        }

        $user = login($username, $password);
        if (!$user) {
            $message_error = "Incorrect name or password";
        }else{
            $_SESSION["name"] = $user->getUsername();
            $_SESSION["password"] = $user->getPassword();
            
            header("Location:index.php");
        }
    }
    if (filter_has_var(INPUT_POST, "cancel")) {
        header("Location: index.php");
    }
    ?>
    <div class="container-fluid">
        <h2>Login form</h2>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
            <div class="form-group">
                <label for="username">User Name:</label>
                <input type="username" class="form-control" id="username" placeholder="Enter username" name="username" value="<?php echo $username ?>">
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" placeholder="Enter password" name="password" value="<?php echo $password ?>">
                <i class="bi bi-eye-slash" id="togglePassword"></i>
            </div>
            <div class="checkbox">
                <label><input type="checkbox" name="remember"> Remember me</label>
            </div>
            <button type="submit" name="loginsubmit" class="btn btn-default">Submit</button>
            <button name="cancel" class="btn btn-default">Cancel</button>
        </form>
        <p style="color:red"><?php echo $message_error ?></p>
    </div>
    <script src="js/close_message.js"></script>
    <script src="js/see_and_hide_password.js"></script>
</body>

</html>