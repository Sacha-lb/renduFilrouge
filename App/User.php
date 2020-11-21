<?php

namespace App;

use Core\Database;

class User extends Database{
    
    public function getAccount($pseudo, $password)
	{
        //On récupere les données recu du formulaire
        $pseudo = htmlspecialchars($pseudo);
        $password = htmlspecialchars($password);

        //On vérifie si des données sont trouvée dans la bdd
		$check = $this->pdo->query("SELECT * 
                                    FROM user 
                                    WHERE user_pseudo = '$pseudo'");
        $data = $check->fetch();
        $row = $check->rowcount();

        
        if ($row === 1) {
            //Si des données sont trouver on hash le pass et le compare a celui de la bdd
            $password = hash('sha256', $password);

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
                header('Location: loginView.php?error=connected');
            }else{
                header('Location: loginView.php?error=password');
            }
        }else{
            //Si aucun compte ne corespond au pseudo on renvoie un message d'erreur
            header('Location: loginView.php?error=pseudo');
        }

    }

    public function setAccount()
    {
       if (isset($_POST['pseudo']) && isset($_POST['email']) && isset($_POST['password'])) {
           //On récupere les données recu et vérifie qu'il n'y a pas déjà un compte inscrit avec le meme identifiant
           $pseudo = htmlspecialchars($_POST['pseudo']);
           $prenom = htmlspecialchars($_POST['prenom']);
           $nom = htmlspecialchars($_POST['nom']);
           $email = htmlspecialchars($_POST['email']);
           $password = htmlspecialchars($_POST['password']);

           $check = $this->pdo->query("SELECT * 
                                    FROM user 
                                    WHERE user_pseudo = '$pseudo' OR user_email = '$email'");
            $data = $check->fetch();
            $row = $check->rowcount();

            if ($row == 0) {
                //On vérifie la taille du pseudo et email
                 if (strlen($pseudo) <= 30) {

                    if (strlen($email) <= 100) {
                        //On verifie qu'il s'agit bien d'une email
                        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                            //On hash le password puis envoyons les données a la bdd
                            $password = hash('sha256', $password);
                            $insert = $this->pdo->prepare("INSERT INTO user(user_pseudo,user_firstName, user_lastName, user_email, user_password, user_online) 
                                                             VALUES (:pseudo, :prenom, :nom, :email, :pass, 0)");
                            $insert->execute(array(
                                'pseudo' => $pseudo,
                                'prenom' => $prenom,
                                'nom' => $nom,                                
                                'email' => $email,
                                'pass' => $password,
                            ));
                            echo 'Bien inscrit !';
                            
                        }else {header('location: signInView.php?error=email');}
                    
                    }else {header('location: signInView.php?error=emailLenght');}
                
                }else {header('location: signInView.php?error=pseudo');}
            
            }else{ header('location: signInView.php?error=already');}
       }
    }

}