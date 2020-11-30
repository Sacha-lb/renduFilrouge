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
    ?>
    <div class="hide">
        <p id="user"><?= $_SESSION['user_id'] ?></p>
        <p id="sondage"><?= $_GET['sondage_id'] ?></p>
    </div>

    <main>

        <section class="chat">
            <article id="zoneMessage">
                <?php
                    use App\Chat;
                    require "../Autoloader.php";
                    Autoloader::register();

                    $chat = new Chat();
                ?>
                <div class="message">
                    <img src="img/user.png" alt="Logo user">
                    <p>Hi there 👋 <br> What brings you to Appetee today ?</p>
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
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="../js/chat.js"></script>
    </main>
</body>

</html>