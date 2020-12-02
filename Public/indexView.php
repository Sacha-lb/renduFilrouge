<?php

use App\IndexTest;

require "../Autoloader.php";
Autoloader::register();
?>




<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <title>Index</title>
</head>
<body>
    <?php
        include 'header.php';
        $sondageEnCours = new IndexTest();
        $listeSondageFini = $sondageEnCours->getSondageFinis($_SESSION['user_id']);
    ?>
    <h1>Liste des sondages en cours de vos amis</h1>
    <ul>
        <?php
            $listeSondageEnCours = $sondageEnCours->getSondageEnCours($_SESSION['user_id']);

        ?>
    </ul>
    <h1>Liste de vos sondages fini</h1>
    <ul>
        <?php
            foreach($listeSondageFini as $sondage):
                echo "<li><a href = resultatView.php?sondage_id=" .  $sondage['sondage_id'] . ">". $sondage['sondage_question'] ."</a></li>"; 
            endforeach;
        ?>
    </ul>
    <h1>Liste de vos sondages en cours</h1>
    <ul>
        <?php
            $listeMesSondageEnCours = $sondageEnCours->getMesSondageEnCours($_SESSION['user_id']);
        ?>
    </ul>
</body>
</html>
