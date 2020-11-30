<?php
use App\Chat;
require "../Autoloader.php";
Autoloader::register();

$chat = new Chat();

if ($_GET['task'] === 'get') {
    $message = $chat->getMessages();
}

if ($_GET['task'] === 'write') {
    $messageSave = $chat->saveChat();
}
