<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>

        <?php
            use App\User;
            require "../Autoloader.php";
            Autoloader::register();
    
            $user = new User();
        ?>

    <?php include 'header.php';?>

    <main>
        <h1>PROFIL</h1>
        <ul class="profil">
            <li class="black">Nom: <?= $_SESSION['user_lastName'] ?> <a href="profilView.php?modifier=user_lastName">MODIFIER</a></li>
            <li class="black">Prenom: <?= $_SESSION['user_firstName'] ?> <a href="profilView.php?modifier=user_firstName">MODIFIER</a></li>
            <li class="black">Pseudo: <?= $_SESSION['user_pseudo'] ?> <a href="profilView.php?modifier=user_pseudo">MODIFIER</a></li>
            <li class="black">Email: <?= $_SESSION['user_email'] ?> <a href="profilView.php?modifier=user_email">MODIFIER</a></li>
            <li class="black">Mot de passe: ********** <a href="profilView.php?modifier=user_password">MODIFIER</a></li>
            <li><a href="profilView.php?modifier=disconnect" class="red" >Se Déconnecter</a></li>
        </ul>


        <?php
        
            if (isset($_GET['modifier'])) {
                ?>
                    <form action=<?php echo "profilView.php?modifier=".$_GET['modifier']?> method="post" id="modif" >
                        <input type="text" name="<?= $_GET['modifier'] ?>" id="modifier">
                        <button type="submit">Modifier</button>
                    </form>
                <?php
                
                if (isset($_POST[$_GET['modifier']])) {
                    if ($_GET['modifier'] === 'user_password') {
                        $user->updatePassword($_POST[$_GET['modifier']], $_SESSION['user_id']);
                    }else{
                        $user->updateUser($_GET['modifier'], $_POST[$_GET['modifier']], $_SESSION['user_id']);
                    }
                }

                if ($_GET['modifier'] === 'disconnect') {
                    $user->disconnect($_SESSION['user_id']);
                    echo 'test';
                }
            }
        ?>
    </main>
</body>

</html>