<nav class="navbar navbar-default">
    <div class="container col-md-10">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
        </div>
        <ul class="nav navbar-nav">
            <?php
            session_start();

            use function roger\session\getRoleInSession;
            use function roger\users\getUsers;
            use function roger\users\validateUser;

            require_once "fn-php/session.php";
            require_once "fn-php/constants.php";
            require_once "fn-php/menus.php";

            $role = "visitor";
            if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
                $role = getRoleInSession($_SESSION["name"], $_SESSION["password"]);
                $users = getUsers(FILENAME);
            }

            foreach ($menus[$role] as $element) {
                echo "<li><a href=" . $element["href"] . ">" . $element["name"] . "</a></li>";
            }
            if (isset($_SESSION["name"]) && isset($_SESSION["password"])){
                $user = validateUser($users, username:$_SESSION["name"],password:$_SESSION["password"]);
                if ($user != false) {
                    echo "<li><a>" . $user->getName() . " " . $user->getSurename() . "</a></li>";
                }
            }

            ?>
        </ul>
    </div>
</nav>