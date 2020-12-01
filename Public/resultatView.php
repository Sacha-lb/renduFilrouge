<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/chat.css">
</head>

<body>
    <?php
        include 'header.php';
        if (isset($_GET['submit'])) {
            if (empty($_POST['reponse'])) {
                header('location: sondageView.php?error=empty&sondage_id='. $_GET['sondage_id'] .'');
            }
        }
        
    ?>
    <div class="hide">
        <p id="user"><?= $_SESSION['user_id'] ?></p>
        <p id="sondage"><?= $_GET['sondage_id'] ?></p>
    </div>

    <main>
        <?php
            use App\AjaxRequest;
            use App\Sondage;
            require "../Autoloader.php";
            Autoloader::register();

            $chat = new AjaxRequest();
            $sondage = new Sondage();

            if (isset($_GET['submit'])) {
                if ($_GET['submit'] === 'yes') {
                    $sondage = $sondage->setReponse();
                }
            }
        ?>

        <section class="chat">
            <article id="zoneMessage">
                <div class="message">
                </div>
            </article>
            <hr>
            <article class="entreMessage">
                <form action="#">
                    <input type="text" name="message" id="chat">
                    <button type="submit" id="submit">Envoyer</button>
                </form>
            </article>
        </section>

        <section class="chat">
            <article>
                <h1>Résultat</h1>
            </article>
            <article>
                <ul id="zoneReponse">
                    <li>Reponse 1: 2 votes</li>
                    <li>Reponse 2: 4 votes</li>
                </ul>
            </article>
        </section>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/chat.js"></script>
    </main>
</body>

</html>