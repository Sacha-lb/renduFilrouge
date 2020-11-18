<?php

namespace App;

use Core\Database;

class Login extends Database{
    
    public function getAccount($pseudo, $password)
	{
        $pseudo = htmlspecialchars($pseudo);
        $password = htmlspecialchars($password);

		$check = $this->pdo->query("SELECT * 
                                    FROM user 
                                    WHERE user_pseudo = '$pseudo'");

        $data = $check->fetch();
        $row = $check->rowcount();

        if ($row === 1) {
            
            //Il faut hash le password
            $password = $password;

            //ICi aussi
            if ($data['user_password'] == $password) {
                session_start();
                $_SESSION['user_pseudo'] = $data['user_pseudo'];
                $_SESSION['user_id'] = $data['user_id'];
                $_SESSION['user_firstName'] = $data['user_firstName'];
                $_SESSION['user_lastName'] = $data['user_lastName'];
                $_SESSION['user_email'] = $data['user_email'];
                $_SESSION['user_online'] = $data['user_online'];
                $online = $this->pdo->query("UPDATE user 
                                    SET user_online = 1
                                    WHERE user_id = ".$data['user_id']."");
                header('Location: friendListView.php');
            }else{
                header('Location: loginView.php?error=password');
            }
        }else{
            header('Location: loginView.php?error=pseudo');
        }

    }

    public function ifConnected()
    {
        if (isset($_POST['pseudo']) && isset($_POST['password'])){
            echo '<p>'.'hello '.$_POST['prenom'].'</p>';
        }
        else{
            echo '<p>il manque un renseignement</p>';
        }
    }

}