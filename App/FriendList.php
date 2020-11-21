<?php

namespace App;

use Core\Database;

class FriendList extends Database{

	
	public function getFriendList ()
	{
		$listFriends = $this->pdo->query("SELECT * FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = 1");
		return $listFriends->fetchAll();
	}

	public function deleteFriend($friendId,$userId)
	{
		$query2 = $this->query("DELETE FROM friendslist WHERE friendsList_userID2 = '$friendId' AND friendsList_userID1 = '$userId'");
	}
}