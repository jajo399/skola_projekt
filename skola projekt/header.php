<nav class="navbar custom-navbar navbar-expand-md navbar-light bg-primary sticky-top">
    <div class="container">
        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="/">Domov</a>
                </li>

                <?php
                    session_start();
                    if (isset($_SESSION['login_user']) == false) {
                        echo "<li class=\"nav-item\">";
                        echo "<a class=\"nav-link\" href=\"/admin/login\">Prihlasit sa</a>";
                        echo "</li>";
                    } else {
                        echo "
                        <li class=\"nav-item\">
                            <a class=\"nav-link\" href=\"/admin/blog-create\">Vytvorit novy clanok</a>
                        </li>
                        ";

                        if (isset($postId)) {
                            echo "
                            <li class=\"nav-item\"><z></z>
                                <a class=\"nav-link\" href=\"/admin/blog-edit/{$postId}\">Upravit clanok</a>
                            </li>
                            ";

                            echo "
                            <li class=\"nav-item\"><z></z>
                                <a class=\"nav-link\" href=\"/admin/blog-delete/{$postId}\">Zmazat clanok</a>
                            </li>
                            ";
                        }

                        echo "
                        <li class=\"nav-item\"><z></z>
                            <a class=\"nav-link\" href=\"/admin/profile-edit\">Upravit profil</a>
                        </li>
                        ";
                    }
                ?>
            </ul>
        </div>
    </div>
</nav>