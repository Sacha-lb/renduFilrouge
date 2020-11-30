<?php

namespace App;

use Core\Database;

class IndexTest extends Database {

    public function getSondageFinish (){
        $listSondageF = $this->pdo->query("SELECT   FROM sondage WHERE date_sondage >");
        $listSondageF = $listSondageF->fetchAll();
    }


}