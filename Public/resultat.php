<?php
use App\AjaxRequest;
require "../Autoloader.php";
Autoloader::register();

$chat = new AjaxRequest();

if ($_GET['task'] === 'get') {
    $message = $chat->getMessages();
}

if ($_GET['task'] === 'write') {
    $messageSave = $chat->saveChat();
}

if ($_GET['task'] === 'result') {
    $message = $chat->getResult();
}
