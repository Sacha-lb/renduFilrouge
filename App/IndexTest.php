<?php

namespace App;

use Core\Database;

class IndexTest extends Database {

    //Affiche les sondages en cours des différents amis
    public function getSondageEnCours ($user){

        $listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user");
        $listFriends = $listFriends->fetchAll();

        foreach ($listFriends as $friend) {

            $friend_id = $friend['friendsList_userID2'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish >= NOW()");
            $listSondageEnCours = $listSondageEnCours->fetchAll();

            foreach ($listSondageEnCours as $Fetch) {
                echo "<li><a href = sondageView.php?sondage_id=" .  $Fetch['sondage_id'] . ">". $Fetch['sondage_question'] ."</a></li>"; 
            }
        }

		$listFriends2 = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID1 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID1 WHERE friendsList_userID2 = $user AND user_online = 1");
		$listFriends2 = $listFriends2->fetchAll();

        foreach ($listFriends2 as $friend) {
            
            $friend_id = $friend['friendsList_userID1'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM sondage 
                                                    WHERE user_id = $friend_id AND sondage_finish >= NOW()");
            $listSondageEnCours = $listSondageEnCours->fetchAll();

            foreach ($listSondageEnCours as $Fetch) {
                echo "<li><a href = sondageView.php?sondage_id=" .  $Fetch['sondage_id'] . ">". $Fetch['sondage_question'] ."</a></li>"; 
            }
        }
    }

    public function getMesSondageEnCours($user){
        
        $listSondageEnCours = $this->pdo->query("SELECT *
                                                FROM sondage 
                                                WHERE user_id = $user AND sondage_finish >= NOW()");
        $listSondageEnCours = $listSondageEnCours->fetchAll();

        foreach ($listSondageEnCours as $Fetch) {
            echo "<li><a href = resultatView.php?sondage_id=" .  $Fetch['sondage_id'] . ">". $Fetch['sondage_question'] ."</a></li>"; 
        }
    }

    public function getSondageFinis ($user){
        
        $listSondageF = $this->pdo->query("SELECT * 
                                            FROM sondage 
                                            WHERE user_id = $user");
        return $listSondageF = $listSondageF->fetchAll();
    }

}