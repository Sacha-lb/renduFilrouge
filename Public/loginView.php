<?php
use App\User;
require "../Autoloader.php";
Autoloader::register();

$user = new User();

if (isset($_GET['submit'])) {
    $user->getAccount($_POST['email'], $_POST['password']);
}elseif (isset($_GET['error'])) {
    switch ($_GET["error"]) {
        case 'connected':
            echo 'Vous êtes connecter !';
            break;
        case 'password':
            echo 'Mot de passe incorect !';
            break;
        case 'pseudo':
            echo 'Pseudo incorect ! ';
            break;
        }   
}
?>

<form action="loginView.php?submit=send" method="post">
    <input type="text" name="email">
    <input type="password" name="password">
    <button type="submit"> Envoyer </button>
</form>