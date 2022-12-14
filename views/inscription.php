<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function


//Load Composer's autoloader
require '../vendor/autoload.php';
require '../assets/php/managers/PHPMailerManager.php';
require '../assets/php/managers/UtilisateurManager.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <title>PageInscription</title>
</head>

<body>
    <form method="post">
        <h1>Inscrivez-vous</h1>
        <section>
            <h2>Nom d'utilisateur</h2>
            <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" maxlength=15 required">
            <h2>Adresse mail</h2>
            <input type="email" name="email" id="mail" placeholder="Adresse e-mail">

            <h2>Mot de passe</h2>
            <input type="password" name="mdp" id="password" placeholder="Mot de passe">
        </section>
        <input type="submit" name="subButton" id="valider">
        <a href="connexion.php">Vers page connexion</a>

    </form>
    <?php
    //Create an instance; passing `true` enables exceptions
    require_once '../vendor/autoload.php';
    require_once "../assets/php/database/DatabaseManager.php";

    if (isset($_POST['subButton'])) {
        $username = isset($_POST['username'])?trim($_POST['username']):"";
        $email = isset($_POST['email'])?trim($_POST['email']):"";
        $mdp = $_POST['mdp'] = isset($_POST['mdp'])?trim($_POST['mdp']):"";
        $cryptMDP = password_hash($mdp,PASSWORD_ARGON2ID);
        $verification = session_id();
        $user = new UtilisateurManager(DatabaseManager::getInstance());
        if($user->existUtilisateur($username)){
            echo"<p class='error'>Cet username existe déjà ! </p>";
        }else{
            $user->createUtilisateur($username,$cryptMDP,$email,$verification);
            PHPMailerManager::sendAMail($email,$username,$verification);
            echo"<p class='message'>Votre compte a bien été crée et un email vous a été envoyé!</p>";
            //sleep(5);
            //header("Location: connexion.php");
        }


    }


    ?>
</body>

</html>
