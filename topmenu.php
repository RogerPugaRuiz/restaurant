<nav class="navbar navbar-default">
    <div class="container col-md-10">
        <div class="navbar-header">
            <a class="navbar-brand" href="https://www.proven.cat">ProvenSoft</a>
        </div>
        <ul class="nav navbar-nav">
            <?php
            session_start();

            use function roger\session\getRoleInSession;

            require_once "fn-php/session.php";
            require_once "fn-php/constants.php";
            require_once "fn-php/menus.php";

            $role = "visitor";
            if (isset($_SESSION["name"]) && isset($_SESSION["password"])) {
                $role = getRoleInSession($_SESSION["name"], $_SESSION["password"]);
            }

            foreach ($menus[$role] as $element) {
                echo "<li><a href=" . $element["href"] . ">" . $element["name"] . "</a></li>";
            }

            ?>
        </ul>
    </div>
</nav>