<header>
        <a href="index.php" ><img src="images/logo_openeduc.jpg" alt="Logo OpenEduc"/></a>
        <h1>OpenEduc</h1>
        <nav>
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="aPropos.php">À propos</a></li>
                <?php
                if((isset($_SESSION["autoriser"]) && $_SESSION["autoriser"] == "oui")) {
                    echo ' <li><a href="#">Profil</a></li>';
                    echo '<li><a href="#">Modifier école</a></li>';
                }
                ?>
            </ul>
        </nav>
        <?php
        if(!(isset($_SESSION["autoriser"]) && $_SESSION["autoriser"] == "oui")) {
            echo '<a href="login.php" class="login-button">Login</a>';
        }
        ?>
        </div>
    </header>