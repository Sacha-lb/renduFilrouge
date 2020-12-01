<?php

namespace App;

use Core\Database;

class AjaxRequest extends Database{

    public function getResult(){

        $sondage = $_GET['sondage_id'];
      
        // 1. On requête la base de données pour sortir les 20 derniers messages
        $resultats = $this->pdo->query("SELECT sondageReponse_reponse, sondageReponse_reponseScore 
                                        FROM sondageReponse 
                                        WHERE sondage_id = $sondage");

        // 2. On traite les résultats
        $messages = $resultats->fetchAll();

        // 3. On affiche les données sous forme de JSON
        echo json_encode($messages);

    }


    public function getMessages(){

        $sondage = $_GET['sondage_id'];
      
        // 1. On requête la base de données pour sortir les 20 derniers messages
        $resultats = $this->pdo->query("SELECT user_id, message_id, message_content, user_pseudo, sondage_id 
                                        FROM message 
                                        NATURAL JOIN user
                                        WHERE sondage_id = $sondage
                                        ORDER BY message_date
                                        LIMIT 30");

        // 2. On traite les résultats
        $messages = $resultats->fetchAll();

        // 3. On affiche les données sous forme de JSON
        echo json_encode($messages);

    }

    public function saveChat()
    {

        $sondage = $_GET['sondage_id'];
        $user = $_GET['user_id'];
        $text = $_GET['text'];

        $sendChat = $this->pdo->prepare("INSERT INTO message (message_content, message_date, user_id, sondage_id) VALUES (:message, NOW(), :user, :sondage)");
        $sendChat->execute(array(
            'message' => $text,
            'user' => $user,
            'sondage' => $sondage,
        ));
        echo json_encode("");
    }

}

?>