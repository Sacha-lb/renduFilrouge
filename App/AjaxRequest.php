<?php

namespace App;

use Core\Database;

class AjaxRequest extends Database{

    public function getResult(){

        $sondage = $_GET['sondage_id'];
      
        //On requête la base de données pour sortir les 20 derniers messages
        $resultats = $this->pdo->query("SELECT sondageReponse_reponse, sondageReponse_reponseScore 
                                        FROM sondageReponse 
                                        WHERE sondage_id = $sondage");
        $messages = $resultats->fetchAll();

        //On affiche les données sous forme de JSON
        echo json_encode($messages);

    }


    public function getMessages(){

        $sondage = $_GET['sondage_id'];
      
        // 1. On requête la base de données pour sortir les 30 derniers messages
        $resultats = $this->pdo->query("SELECT user_id, message_id, message_content, user_pseudo, sondage_id 
                                        FROM message 
                                        NATURAL JOIN user
                                        WHERE sondage_id = $sondage
                                        ORDER BY message_date
                                        LIMIT 30");
        $messages = $resultats->fetchAll();

        // 3. On affiche les données sous forme de JSON
        echo json_encode($messages);

    }

    public function saveChat()
    {

        //On récupere les données entrée par l'utilisateur
        $sondage = $_GET['sondage_id'];
        $user = $_GET['user_id'];
        $text = $_GET['text'];

        //On envoie les donnée dans la bdd
        $sendChat = $this->pdo->prepare("INSERT INTO message (message_content, message_date, user_id, sondage_id) VALUES (:message, NOW(), :user, :sondage)");
        $sendChat->execute(array(
            'message' => $text,
            'user' => $user,
            'sondage' => $sondage,
        ));

        //On renvoie un format json
        echo json_encode("");
    }

}

?>