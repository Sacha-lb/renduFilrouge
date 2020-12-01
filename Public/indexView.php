<?php

use App\IndexTest;

require "../Autoloader.php";
Autoloader::register();


$sondageEnCours = new IndexTest();
$listeSondageEnCours = $sondageEnCours->getSondageEnCours();
$listeSondageFini = $sondageEnCours->getSondageFinis();
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
    ?>
    <h1>Liste des sondages fini</h1>
    <ul>
        <?php
            foreach($listeSondageFini as $sondage):
                echo "<li><a href = sondageView.php?sondage_id=" .  $sondage['sondage_id'] . ">". $sondage['sondage_question'] ."</a></li>"; 
            endforeach;
        ?>
    </ul>
    <h1>Liste des sondages en cours</h1>
    <ul>
        <?php
            foreach($listeSondageEnCours as $sondage):
                echo "<li><a href = sondageView.php?sondage_id=" .  $sondage['sondage_id'] . ">". $sondage['sondage_question'] ."</a></li>"; 
            endforeach;
        ?>
    </ul>
</body>
</html>
