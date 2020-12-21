<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/connexion.css">
</head>

<body>

    <?php include 'header.php';?>


    <?php
        use App\User;
        require "../Autoloader.php";
        Autoloader::register();

        $user = new User();

        if (isset($_GET['submit'])) {
            $user->getAccount($_POST['pseudo'], $_POST['password']);
        }elseif (isset($_GET['error'])) {
            switch ($_GET["error"]) {
                case 'connected':
                    echo '<h1 class="green">Vous êtes connecter !</h1>';
                    header("location: indexView.php");
                    break;
                case 'password':
                    echo '<h1 class="red">Mot de passe incorect !</h1>';
                    break;
                case 'pseudo':
                    echo '<h1 class="red">Pseudo incorect ! </h1>';
                    break;
                }   
        }


        if (isset($_SESSION['user_id'])) {
            ?>
                <a href="#">Crée un sondage</a>
                <a href="#">Sondage</a>
                <a href="#">Profil</a>
            <?php
        }else{
            ?>
                <div class="connexion">
                    <form action="loginView.php?submit=send" method="post">
                        <h3>Connexion</h3>
                        <label for="email">Pseudo : </label>
                        <input type="text" name="pseudo"> <br>
                        <label for="email">Password : </label>
                        <input type="password" name="password"> <br>
                        <button id="submit" type="submit"> Envoyer </button> <br> <br>
                        <a href="signInView.php?connected=no" class="button">S'inscire</a>
                    </form>

                </div>
            <?php
        }

        ?>


</body>

</html>