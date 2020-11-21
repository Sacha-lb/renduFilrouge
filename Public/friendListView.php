<?php

use App\FriendList;

require "../Autoloader.php";
Autoloader::register();

$friendList = new FriendList();
$listFriends = $friendList->getFriendList();
var_dump ($listFriends);

if (isset($_GET['deleteFriendId'])) {
    $friendList->deleteFriend($_GET['deleteFriendId'], 1);
}
?>

<h1>Liste d'amis</h1>
<table>
	<tr>
		<td>Pseudo</td>
		<td>Supprimer</td>
	</tr>
	
         
         <?php
              foreach($listFriends as $friend):
              echo '<tr><td>' . $friend["friendsList_userID2"] . '</td><td><a href="friendListView.php?deleteFriendId=' . $friend['friendsList_userID2'] .'">Supprimer amis</a></td></tr>'; 
              endforeach;
         ?>
</table>

