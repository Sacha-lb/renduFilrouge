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
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Narrow&family=Indie+Flower&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Index</title>
</head>
<body>
    <?php
        include 'header.php';
        $sondageEnCours = new IndexTest();
        $listeSondageFini = $sondageEnCours->getSondageFinis($_SESSION['user_id']);
    ?>
    <h1 class="sondageMenu">Liste des sondages en cours de vos amis</h1>
    <ul class="menu">
        <?php
            $listeSondageEnCours = $sondageEnCours->getSondageEnCours($_SESSION['user_id']);

        ?>
    </ul>
    <h1 class="sondageMenu">Liste de vos sondages fini</h1>
    <ul class="menu">
        <?php
            foreach($listeSondageFini as $sondage):
                echo "<li><a href = resultatView.php?sondage_id=" .  $sondage['sondage_id'] . ">". $sondage['sondage_question'] ."</a></li>"; 
            endforeach;
        ?>
    </ul>
    <h1 class="sondageMenu">Liste de vos sondages en cours</h1>
    <ul class="menu">
        <?php
            $listeMesSondageEnCours = $sondageEnCours->getMesSondageEnCours($_SESSION['user_id']);
        ?>
    </ul>
    <ul class="menu">
        <h1 class="sondageConcept">Descendez pour comprendre notre concept</h1>
    </ul>
    <div class="page">
        <div class="section1">
            <h1 class="titleSection1">A vous de jouer</h1>
        </div>
        <div class="section2">
            <h3 class="titleSection2"><a href="sondages.html">Sport</a></h3>
        </div>
        <div class="section3">
            <h3 class="titleSection3"><a href="sondages.html">Emission</a></h3>
        </div>
        <div class="section5">
            <h3 class="titleSection5"><a href="sondages.html">Streaming</a></h3>
        </div>
        <div id="concept" class="textSection">
            <h1>Notre concept</h1>
            <p>Jouez et défiez vos amis à travers nos différents sondages. Répondez à nos sondages à travers différents domaines : sport, télévision, paris et confrontez vos connaissances à celle des autres. Des prix exclusifs sont à gagner.</p>
        </div>
        <div class="section4">
            <h1>Enjoy</h1>
        </div>
    </div>
</body>
</html>
