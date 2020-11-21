<?php

namespace App;

use Core\Database;

class FriendList extends Database{

	
	public function getFriendList ()
	{
		$listFriends = $this->pdo->query("SELECT friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE user_id = 1");
		//SELECT friendList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendList_userID1 WHERE user_id = 1
		return $listFriends->fetchAll(\PDO::FETCH_ASSOC);
	}

	public function deleteFriend($userId,$friendId)
	{
		$query2 = $this->query("DELETE FROM friendslist WHERE friendList_userID2 = $friendId AND friendList_userID1 = $userId");
	}
}