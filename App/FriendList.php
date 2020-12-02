<?php

namespace App;

use Core\Database;

class FriendList extends Database{

	
	public function getFriendList()
	{
		//On récupere l'id de l'utilisateur
		$user = $_SESSION['user_id'];

		//On fait des requette pour récuperer ses amies
		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 1");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 1");
		$listFriends = $listFriends->fetchAll();
		$listFriends2 = $listFriends2->fetchAll();

		//On affiche la liste
		foreach ($listFriends as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
		foreach ($listFriends2 as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
	}

	public function getFriendListDisconnect()
	{

		//On récupere l'id de l'utilisateur
		$user = $_SESSION['user_id'];

		//On fait des requette pour récuperer ses amies qui ne sont pas connecter
		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 0");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 0");
		$listFriends = $listFriends->fetchAll();
		$listFriends2 = $listFriends2->fetchAll();
		
		//On affiche la liste
		foreach ($listFriends as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
		foreach ($listFriends2 as $friend) {
			echo "<li> " . $friend['user_pseudo']."<a href='friendListView.php?delete=". $friend['friendsList_id'] ."' class='red'>supprimer</a></li>";
		}
	}

	public function deleteFriend($friendId)
	{
		//On supprime l'amis séléctionner
		$deleteFriend = $this->query("DELETE FROM friendslist WHERE friendsList_id = '$friendId'");
		$deleteFriend2 = $this->query("DELETE FROM friendslist WHERE friendsList_id = '$friendId'");
	}

	public function searchFriend($pseudo)
	{

		//On recherche une personne avec un pseudo qui contient ce que l'utilisateur a entrer
		$pseudo = "%". $pseudo . "%";
		$query = $this->pdo->query("SELECT user_pseudo, user_id FROM user WHERE user_pseudo LIKE '$pseudo' ");
		$query = $query->fetchAll();
		return ($query);
	}

	public function addFriend($friendId, $user)
	{	
		//On vérifie que les deux personne ne sont pas déjà amis
		$listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user AND user_online = 0");
		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 0");
		
		$row = $listFriends->rowcount();

		if ($row == 0) {

			//On vérifie que les deux personne ne sont pas déjà amis
			$row = $listFriends2->rowcount();

			if ($row == 0) {

				//Si il ne sont pas amis on ajoute la relation entre les deux personnes
				$query = $this->pdo->query("INSERT INTO friendsList (friendsList_userID1, friendsList_userID2) VALUES('$user', '$friendId')");
				echo '<p class="green titre">Vous etes maintenant amis !<p>';


			}else{
				//Sinon on affiche l'erreur
				echo '<p class="red">Vous etes déja amis !<p>';
			}
		}else{
				//Sinon on affiche l'erreur
				echo '<p class="red titre">Vous etes déja amis !<p>';
		}
	}
}