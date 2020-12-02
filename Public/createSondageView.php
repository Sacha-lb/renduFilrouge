<?php
    use App\CreateSondage;
    require "../Autoloader.php";
    Autoloader::register();

    $sondage = new CreateSondage();

    include 'header.php';
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crée un sondage</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <?php
        //Envoie vers la page creation de sondage si l'user est sur la page réponse maus que aucune question n'est enregistrer
        if (isset($_GET['submit'])) {   
        }else{
            header('Location: CreateSondageView.php?submit=create');
        }
        if ($_GET['submit'] == 'create') {
            if (isset($_GET['complete'])) {
                echo 'Veuillez remplir tout les champs';
            }
    ?>

    <h1> Création de votre sondage !</h1>

    <h2> Veuillez indiquer votre question :</h2>

    <form method="post" action="createSondageView.php?submit=createSondage">
        <p>Question : </p>
        <input type="text" name="sondageQuestion">
        <p>Temps en minutes (60 max): </p>
        <input id="number" name="number" type="number" value="0" min="0" max="60">
        <button type="submit">Envoyer</button>
    </form>

    <?php
        }
        //Ajoute la question dans la BDD
        if ($_GET['submit'] == 'createSondage') {
            if (empty($_POST['sondageQuestion'])) {
                header('Location: CreateSondageView.php?submit=create');
            }else{
                $sondage->setSondage($_POST['sondageQuestion'], $_SESSION['user_id'],$_POST['number']);
                header('Location: CreateSondageView.php?submit=reponse');
            }
        }
        //Demande les différentes réponse possible
        if ($_GET['submit'] == 'reponse') { ?>

    <h2>Indiquez les réponses possibles :</h2>

    <form method="post" action="createSondageView.php?submit=sendResponse">
        <p>Reponse 1 : </p>
        <input type="text" name="reponse1">
        <p>Reponse 2 : </p>
        <input type="text" name="reponse2">
        <button name="sendReponse" type="submit">Envoyer</button>
    </form>
    <?php }


        if ($_GET['submit'] == 'sendResponse') {
            $sondage_id = $sondage->getSondage($_SESSION['user_id']);
            ?>

    <h2>Votre sondage a bien été ajouté !</h2>

    <?php
            
            $i = 1;
            while (isset($_POST['reponse' . $i])) {
                $sondage->setResponse($_POST['reponse' . $i], $sondage_id['sondage_id']);
                $i++;
            }
    
            ?>
    <a href="indexView.php">Retour à Acceuil</a>
    <?php
        
            }
        
        ?>

</body>

</html>