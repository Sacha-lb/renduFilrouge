<header>
<img src="../App/img/pngwave.png" alt="logo">
        <ul>
        <navbar>
            <?php
                //Lancement de la session
                session_start();

                //Redirige vers la page Login si l'utilisateur n'est pas connecter
                if (!isset($_GET['connected'])) {
                    if (!isset($_SESSION['user_id'])) {
                        header("location: loginView.php?connected=no");
                    }
                }
                
                //Affiche Profil ou connexion selon si l'utilisateur est connecter
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="profilView.php">Profil</a></li>';
                }else{
                    echo '<li><a href="loginView.php">Sign In/Login</a></li>';
                }

                //Affiche la liste d'amis ou non selon si l'utilisateur est connecter
                if (isset($_SESSION['user_id'])) {
                    echo '<li><a href="friendListView.php">Amis</a></li>';
                }
            ?>
            <li><a href="createSondageView.php">Crée un sondage</a></li>
            <li><a href="indexView.php">Sondage</a></li>
            </navbar>
        </ul>    
    </header>