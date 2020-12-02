<?php

namespace App;

use Core\Database;

class FriendList extends Database{

	
	public function getFriendList()
	{

		$user = $_SESSION['user_id'];

		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 1");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 1");
		$listFriends = $listFriends->fetchAll();
		$listFriends2 = $listFriends2->fetchAll();
		foreach ($listFriends as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
		foreach ($listFriends2 as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
	}

	public function getFriendListDisconnect()
	{

		$user = $_SESSION['user_id'];

		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 0");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 0");
		$listFriends = $listFriends->fetchAll();
		$listFriends2 = $listFriends2->fetchAll();
		foreach ($listFriends as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
		foreach ($listFriends2 as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
	}

	public function deleteFriend($friendId)
	{

		$deleteFriend = $this->query("DELETE FROM friendslist WHERE friendsList_id = '$friendId'");
		$deleteFriend2 = $this->query("DELETE FROM friendslist WHERE friendsList_id = '$friendId'");
	}

	public function searchFriend($pseudo)
	{

		$pseudo = "%". $pseudo . "%";
		$query = $this->pdo->query("SELECT user_pseudo, user_id FROM user WHERE user_pseudo LIKE '$pseudo' ");
		$query = $query->fetchAll();
		return ($query);
	}

	public function addFriend($friendId, $user)
	{	
		
		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 0");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 0");
		
		$row = $listFriends->rowcount();

		if ($row == 0) {

			$row = $listFriends2->rowcount();

			if ($row == 0) {

				$query = $this->pdo->query("INSERT INTO friendsList (friendsList_userID1, friendsList_userID2) VALUES('$user', '$friendId')");
				echo '<p class="green titre">Vous etes maintenant amis !<p>';


			}else{
				echo '<p class="red">Vous etes déja amis !<p>';
			}

		}else{
			echo '<p class="red titre">Vous etes déja amis !<p>';
		}
	}
}