<?php

use App\FriendList;

require "../Autoloader.php";
Autoloader::register();

$friendList = new FriendList();
$friendList->getFriendList();
