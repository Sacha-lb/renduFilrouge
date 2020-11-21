<?php
use App\User;
require "../Autoloader.php";
Autoloader::register();

$user = new User();

if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case 'succes':
            $user->setAccount();
            break;
        case 'already':
            echo 'Vous êtes déjà inscrit !';
            break;
        case 'pseudo':
            echo 'Votre pseudo fait plus de 30 caracteres';
            break;
        case 'email':
            echo 'Ceci n"est pas une adresse email !';
            break;
        case 'emailLenght':
            echo 'Votre email est trop longue !';
            break;
        }    
}
?>

<form action="signInView.php?error=succes" method="post">
    pseudo : <input type="text" name="pseudo">
    prenom : <input type="text" name="prenom">
    nom : <input type="text" name="nom">
    email : <input type="text" name="email">
    password : <input type="password" name="password">
    <button type="submit"> Envoyer </button>
</form>