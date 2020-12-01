<?php

namespace App;

use Core\Database;

class IndexTest extends Database {

    public function getSondageEnCours (){
        $listSondageEnCours = $this->pdo->query("SELECT *
                                          FROM sondage 
                                          WHERE sondage_finish >= NOW()");
        return $listSondageEnCours = $listSondageEnCours->fetchAll();
    }

    public function getSondageFinis (){
        $listSondageF = $this->pdo->query("SELECT *
                                          FROM sondage 
                                          WHERE sondage_finish >= NOW()");
        $listSondageF = $listSondageF->fetchAll();
    }


}