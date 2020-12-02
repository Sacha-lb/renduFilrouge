<?php

namespace App;

use Core\Database;

class Sondage extends Database{

    public function getQuestion()
    {
        //Affiche la question de la bdd
        $sondage = $_GET['sondage_id'];

        $request = $this->pdo->query("SELECT * FROM sondage WHERE sondage_id = $sondage");
        $request = $request->fetch();
        echo $request['sondage_question'] . "?";

        $request = $this->pdo->query("SELECT * FROM sondageReponse WHERE sondage_id = $sondage");
        return $request = $request->fetchAll();
    }

    public function setReponse()
    {
        //Enregistre les réponse recu dans la bdd
        $sondage = $_GET['sondage_id'];
        $reponse = $_POST['reponse'];

        $request = $this->pdo->query("UPDATE sondageReponse 
                                        SET sondageReponse_reponseScore = sondageReponse_reponseScore + 1 
                                        WHERE sondage_id = $sondage AND sondageReponse_reponse LIKE '$reponse%' ");
        
    }

    public function shareEmail ($user){

        //Récupere la liste d'amis
        $listFriends = $this->pdo->query("SELECT friendsList_id,user_pseudo,friendsList_userID2 FROM friendslist INNER JOIN user ON user.user_id = friendslist.friendsList_userID2 WHERE friendsList_userID1 = $user");
        $listFriends = $listFriends->fetchAll();

        //Pour chaque amis
        foreach ($listFriends as $friend) {

            //Selectionne ses infos
            $friend_id = $friend['friendsList_userID2'];
            $listSondageEnCours = $this->pdo->query("SELECT *
                                                    FROM user 
                                                    WHERE user_id = $friend_id");
            $listSondageEnCours = $listSondageEnCours->fetchAll();

            //Et lui envoie un email 
            foreach ($listSondageEnCours as $Fetch) {

                $sujet = 'Répondre à un sondage';
                $message = "Salut,<br /> Je t'invite à répondre à mon nouveau sondage";
                $destinataire = $Fetch['user_email'];
                $headers = "From: \"expediteur moi\"<moi@domaine.com>\n";
                $headers .= "Reply-To: moi@domaine.com\n";
                $headers .= "Content-Type: text/html; charset=\"iso-8859-1\"";
                if(mail($destinataire,$sujet,$message,$headers)){
                    echo "L'email a bien été envoyé.";
                }
                else{
                   echo "Une erreur c'est produite lors de l'envois de l'email.";
                }

            }
        }
    }
}