<?php

use App\FriendList;

require "../Autoloader.php";
Autoloader::register();

$friendList = new FriendList();
$friendList->getFriendList();

if (isset($_GET['deleteFriendId'])) {
    $friendList->deleteFriend($_GET['deleteFriendId'], $userId);
?>

<h1>Liste d'amis</h1>
<table>
	<tr>
		<td>Pseudo</td>
		<td>Supprimer</td>
	</tr>
	     <?php foreach($listFriends as $friend): ?>
            <tr>
                <td><a href="order.php?friendId=<?= $friend['friendList_userID2'] ?>">Supprimer amis</a></td>
                <td><?= $friend->orderDate ?></td>
                <td><a href="order.php?deleteFriendId=<?= $friend['friendList_userID2'] ?>">Supprimer amis</a></td>
            </tr>
         <?php endforeach; ?>
</table>