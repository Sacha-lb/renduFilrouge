<?php

namespace App;

use Core\Database;

Class CreateSondage extends Database{

    public function setSondage($sondageQuestion, $userid){

        $temps = 15;

        $question = htmlspecialchars($sondageQuestion);

        $insert = $this->pdo->query("INSERT INTO sondage(sondage_question, user_id, sondage_finish) 
                                        VALUES ('$question', $userid, ADDDATE(NOW(), INTERVAL $temps MINUTE) )");

    }

    public function getSondage($userid){

        $select = $this->pdo->query("SELECT * FROM sondage 
                                    WHERE user_id = $userid
                                    ORDER BY sondage_id desc
                                    LIMIT 1");
        return $select->fetch();
    }

    public function setResponse($reponse1, $sondageID){
        $insert = $this->pdo->query("INSERT INTO sondageReponse(sondage_id, sondageReponse_reponse) 
                                    VALUES ('$sondageID','$reponse1')");
    }
}
