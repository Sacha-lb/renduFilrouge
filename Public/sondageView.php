<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sondage</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/sondage.css">
</head>

<body>

    <?php 
        include 'header.php';

        use App\Sondage;

        require "../Autoloader.php";
        Autoloader::register();

        $sondage = new Sondage();

        if (isset($_GET['error'])) {

            if ($_GET['error'] === 'empty') {
                echo '<p class"red"> Veuillez selectionner une réponse !</p>';
            }
        }
    
    ?>

    <form action="resultatView.php?submit=yes&sondage_id=<?= $_GET['sondage_id']?>" method="post">
        <?php 
            $sondage = $sondage->getQuestion($_GET['sondage_id']);
            foreach ($sondage as $question) {
                echo "<li><input type='radio' name='reponse' value='" . $question['sondageReponse_reponse'] . "'>" . $question['sondageReponse_reponse'] . "</li>";
            }
        ?>
        <button type="submit">Envoyer</button>
    </form>

</body>

</html>