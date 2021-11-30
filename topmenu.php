<nav class="navbar navbar-default">
    <div class="container col-md-10">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
        </div>
        <ul class="nav navbar-nav">
            <?php

            use function roger\session\getRoleInSession;
            use function roger\users\getUsers;
            use function roger\users\validateUser;

            require_once "fn-php/session.php";
            require_once "fn-php/constants.php";
            require_once "fn-php/menus.php";
            require_once "fn-php/user.php";

            $role = "visitor";
            $u = null;
            if (isset($_SESSION["user"])) {
                $u = unserialize($_SESSION["user"]);
                $role = $u->getRole();
            }

            foreach ($menus[$role] as $element) {
                echo "<li><a href=" . $element["href"] . ">" . $element["name"] . "</a></li>";
            }
            if (isset($_SESSION["user"])){
                

                echo "<li><a>" . $u->getName() . " " . $u->getSurename() . "</a></li>";

            }

            ?>
        </ul>
    </div>
</nav>