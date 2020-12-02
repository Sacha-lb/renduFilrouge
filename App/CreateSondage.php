<?php

namespace App;

use Core\Database;

Class CreateSondage extends Database{
    
    
    public function setSondage($sondageQuestion, $userid, $tempsnumber){

        //On récupere le temps et la question de l'utilisateur puis l'entrons dans la bdd
        $temps = $tempsnumber;

        $question = htmlspecialchars($sondageQuestion);

        $insert = $this->pdo->query("INSERT INTO sondage(sondage_question, user_id, sondage_finish) 
                                        VALUES ('$question', $userid, ADDDATE(NOW(), INTERVAL $temps MINUTE) )");

    }

    public function getSondage($userid){

        //On récupere le dernier sondage de l'utilisateur
        $select = $this->pdo->query("SELECT * FROM sondage 
                                    WHERE user_id = $userid
                                    ORDER BY sondage_id desc
                                    LIMIT 1");
        return $select->fetch();
    }

    public function setResponse($reponse1, $sondageID){

        //On insert les réponse entrée par l'utilisateur dans la bdd
        $insert = $this->pdo->query("INSERT INTO sondageReponse(sondage_id, sondageReponse_reponse, sondageReponse_reponseScore) 
                                    VALUES ('$sondageID','$reponse1', 0)");
    }
}
