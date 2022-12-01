<?php

use app\users\Auth;

require_once "../assets/php/managers/ConnexionManager.php";
require_once "../src/app/users/Auth.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(Auth::isConnected()){
   header("Location : test.php");
    exit(0);
}

if(isset($_POST["id-connexion"]) && isset($_POST["password-connexion"])){
    ConnexionManager::login($_POST["id-connexion"],$_POST["password-connexion"]);
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/connexion.css">
    <title>PageLogin</title>
</head>
<body>
    <form method="post">
        <h1>Connectez-vous</h1>
        <section>
            <h2 for="username">Nom d'utilisateur</h2>
            <input type="text" name="id-connexion" id="username" placeholder="Nom d'utilisateur">
            <h2>Mot de passe</h2>
            <input type="password" name="password-connexion" id="password" placeholder="Mot de passe"
        </section>
        <input type="submit" id="valider">
    </form>
</body>

</html>