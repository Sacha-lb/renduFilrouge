<?php

namespace App;

use Core\Database;

class Sondage extends Database{

    public function getQuestion()
    {
        $sondage = $_GET['sondage_id'];

        $request = $this->pdo->query("SELECT * FROM sondage WHERE sondage_id = $sondage");
        $request = $request->fetch();
        echo $request['sondage_question'] . "?";

        $request = $this->pdo->query("SELECT * FROM sondageReponse WHERE sondage_id = $sondage");
        return $request = $request->fetchAll();
    }

    public function setReponse()
    {
        $sondage = $_GET['sondage_id'];
        $reponse = $_POST['reponse'];

        $request = $this->pdo->query("UPDATE sondageReponse 
                                        SET sondageReponse_reponseScore = sondageReponse_reponseScore + 1 
                                        WHERE sondage_id = $sondage AND sondageReponse_reponse LIKE '$reponse%' ");
        
    }

}