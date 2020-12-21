<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendslist</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/amis.css">
</head>

<body>

    <?php 
        include 'header.php';

        use App\FriendList;

        require "../Autoloader.php";
        Autoloader::register();

        $friendList = new FriendList();


        if (isset($_GET['delete'])) {
            $friendList->deleteFriend($_GET['delete']);
        }

        if (isset($_GET['submit'])){

            $searchFriend = $friendList->searchFriend($_POST['recherche']);
        }

        if (isset($_GET['addFriendId'])){
            $friendList->addFriend($_GET['addFriendId'], $_SESSION['user_id']);
        }
    ?>
    <div class="pageAmis">
        <p class="titre ol">Vos amis en ligne :</p>
        <?php
            $listFriends = $friendList->getFriendList();
        ?>
        <p class="titre hl">Vos amis hors ligne :</p>
        <?php
            $listFriendsH = $friendList->getFriendListDisconnect();
        ?>

        <p class="titre sf">Vous recherchez une personne ?</p>
        <form method="POST" action="friendListView.php?submit=send">
            <input type="text" placeholder="Rechercher..." name="recherche">
            <input type="submit" value="Rechercher">
        </form>

        <table>

            <?php
        if (isset($_GET['submit'])){
        foreach($searchFriend as $friend):
                if ($friend['user_id'] === $_SESSION['user_id']) {
                    echo '<tr><td>' . $friend["user_pseudo"] . '</td><td><p>|  Vous </p></td></tr>'; 
                }
                echo '<tr><td>' . $friend["user_pseudo"] . '</td><td><a href="friendListView.php?addFriendId='.$friend['user_id'] .'" class="green">|  Ajouter amis </a></td></tr>'; 
            endforeach;
        }   
                
            ?>
        </table>
    </div>
    

</body>

</html>