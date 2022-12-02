<?php

require_once "../src/app/users/Auth.php";

use app\users\Auth;

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

if(!Auth::isConnected()){
    header("location: connexion.php");
    exit(0);
}

if(isset($_POST["deconnect"])){
    Auth::disconnect();
    header("location: connexion.php");
    exit(0);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/accueil.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100;200&display=swap" rel="stylesheet">
    <title>Accueil</title>
</head>

<body>
<header>
    <h1>Accueil</h1>
    <nav class="nav">
        <ul>
            <li class="nav"><a href="#">Escape Game</a></li>
            <li class="nav"><a href="#">Informations</a></li>
            <li class="nav"><a href="parametres.php">Paramètres</a></li>
            <form method="post"><input type="submit" name="deconnect" value="Se déconnecter"></form>
        </ul>
    </nav>
</header>
</body>
</html>