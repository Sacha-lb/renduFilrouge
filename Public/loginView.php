<?php

use App\Login;

require "Autoloader.php";
Autoloader::register();

$login = new Login();

if(isset($_POST['email'])) {
    $email = $_POST['email'];
    $login->addAccount($email);
    echo $_POST['email'];
}
?>

<form action="login.php" method="post">
    <input type="email" name="email">
    <input type="password" name="password">
    <button type="submit">Envoyer</button>
</form>