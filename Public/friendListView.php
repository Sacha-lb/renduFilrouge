<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Friendslist</title>
    <link rel="stylesheet" href="../css/style.css">
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

    <h1>Liste d'amis</h1>
    <table>
        <tr>
            <td>Pseudo</td>
            <td>Supprimer</td>
        </tr>


        <?php
              $listFriends = $friendList->getFriendList();
         ?>
    </table>

    <form method="POST" action="friendListView.php?submit=send">
        <input type="text" name="recherche">
        <input type="submit" value="Rechercher">
    </form>

    <table>

        <?php
    if (isset($_GET['submit'])){
       foreach($searchFriend as $friend):
            echo '<tr><td>' . $friend["user_pseudo"] . '</td><td><a href="friendListView.php?addFriendId=' . $friend['user_id'] .'">|  Ajouter amis</a></td></tr>'; 
        endforeach;
    }   
              
         ?>
    </table>

</body>

</html>