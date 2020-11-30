<?php
    use App\CreateSondage;
    require "../Autoloader.php";
    Autoloader::register();

    $sondage = new CreateSondage();

    if (isset($_GET['submit'])) {   
    }else{
        header('Location: CreateSondageView.php?submit=create');
    }

    if ($_GET['submit'] == 'create') {
        ?>
            <h1> Création de votre sondage !</h1>

            <h2> Veuillez indiquer votre question :</h2>

            <form method="post" action="createSondageView.php?submit=createSondage">
                <input type="text" name="sondageQuestion">
                <button type="submit">Envoyer</button>
            </form>

        <?php
    }

    if ($_GET['submit'] == 'createSondage') {
        $sondage->setSondage($_POST['sondageQuestion'], 1);
        header('Location: CreateSondageView.php?submit=reponse');
    }

    if ($_GET['submit'] == 'reponse') {
        ?>

            <h2>Indiquez les réponses possibles :</h2>

            <form method="post" action="createSondageView.php?submit=sendResponse">
                <p>Reponse 1 : </p>
                <input type="text" name="reponse1">
                <p>Reponse 2 : </p>
                <input type="text" name="reponse2">
                <button name="sendReponse" type="submit">Envoyer</button>
            </form>

        <?php
    }

    if ($_GET['submit'] == 'sendResponse') {
        $sondage_id = $sondage->getSondage(1);

        ?>

        <h2>Votre sondage a bien été ajouté !</h2>

        <?php

        $i = 1;
        while (isset($_POST['reponse' . $i])) {
            $sondage->setResponse($_POST['reponse' . $i], $sondage_id['sondage_id']);
            $i++;
        }

    }

?>