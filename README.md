# PROJET POO

Projet poo - El Guendouz Ayoub / Sacha Le Bras / Mathilde ASSELIN

## Installation

Go to the folder of your project, and write in your terminal this line

```bash
git clone git@github.com:Sacha-lb/renduPOO.git
```

## Add Database

Go to Core/Config/config.php and write your phpmyadmin informations

```php
$dbConfig = [
    "host" => "localhost",
    "dbname" => "sondageApp",
    "user" => "root",
    "pass" => "root"
];
```

Go to phpmyadmin, click on import and select the sql file who is in your racine folder

## Fonctionnement du site

Tout d'abord connectez vous avec vos identifiant, sinon vous n'aurez accès a aucune page

Vos identifiants sont les suivant:

```php
userInformation :

    "user" => " Alexandre.G "
    "password" => " password "
```

1) profil : Si vous allez sur la page profil, vous pourrez essayer de modifier vos informations de connexion ainsi que vous déconnecter !

2) Amis : Si vous allez sur la page amis vous pourrez voir vos amis en ligne et hors ligne, Vous pourrez rechercher des utilisateurs, les ajouter en amis ainsi que les supprimer ! 

Vous pouvez essayer ceci avec les pseudos suivant : 
```php
Pseudo :

    "pseudo1" => " AyoubPseudo "
    "pseudo2" => " sachaPseudo "
    "pseudo3" => " MathildePseudo "

```

3) Crée un sondage : Si vous allez sur cette page vous pourrez crée un sondage en répondant aux données demander !

4) Sondage : Si vous allez sur cette page, vous pourrez consulter les sondages passé et les sondages en cours, si vous cliquez sur les sondages en cours vous aurez la possibilité de répondre, et si vous cliquez sur les sondages passé, vous aurez la possibilité d'afficher les résultats ainsi que le chat.

5) Résultat : Vous pourrez afficher les messages et les résultats du sondage une fois que vous y aurez répondu