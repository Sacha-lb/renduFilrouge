<?php
use App\Login;
require "../Autoloader.php";
Autoloader::register();

$login = new Login();

if (isset($_GET['submit'])) {
    $login->getAccount($_POST['email'], $_POST['password']);
}elseif (isset($_GET['error'])) {
    if ($_GET['error'] == 'pseudo') {
        echo 'Pseudo Incorect';
    }elseif ($_GET['error'] == 'password'){
        echo 'password incorect';
    }
}
?>

<form action="loginView.php?submit=send" method="post">
    <input type="text" name="email">
    <input type="password" name="password">
    <button type="submit"> Envoyer </button>
</form>