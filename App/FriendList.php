<?php

class FriendList extends Database{

	public function getFriendList ()
	{
		$query1 = $this->pdo->query("SELECT * FROM friendslist");
		var_dump($query1);
	}



}