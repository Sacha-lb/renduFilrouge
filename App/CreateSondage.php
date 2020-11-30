<?php

namespace App;

use Core\Database;

Class CreateSondage extends Database{

    public function setSondage($sondageQuestion, $userid){

        $question = htmlspecialchars($sondageQuestion);

        $insert = $this->pdo->query("INSERT INTO sondage(sondage_question, user_id) 
                                        VALUES ('$question', $userid)");

    }

    public function getSondage($userid){

        $select = $this->pdo->query("SELECT * FROM sondage 
                                    WHERE user_id = $userid
                                    ORDER BY sondage_id desc
                                    LIMIT 1");
        return $select->fetch();
    }

    public function setResponse($reponse1, $sondageID){
        $insert = $this->pdo->query("INSERT INTO sondageReponse(sondage_id, reponse) 
                                    VALUES ('$sondageID','$reponse1')");
    }
}