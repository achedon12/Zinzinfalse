<?php
session_start();
require "UtilisateurManager.php";
require "assets/php/managers/PartieManager.php";
require "PDO.php";

$userManager = new UtilisateurManager(DatabaseManager::getInstance());
$partieManager = new PartieManager(DatabaseManager::getInstance());

//$_COOKIE['temps'];
//$_COOKIE['score'];
//$_COOKIE['user'];
$partieManager->createPartie($_COOKIE['score'],$_COOKIE['temps'],$_COOKIE['user']);
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>ZINZINFALSE</title>
        <meta name="ZINZINFALSE">
        <link rel="stylesheet" href="src/cssphaser.css">
    </head>
        <body>

            <section>
                <?php
                    echo "<table>";
                    echo "<tr><th>Pseudo</th><th>Time</th><th>Score</th></tr>";
                    foreach ($partieManager->getAllPartie() as $partie) {
                        echo "
                                <tr>
                                    <td>".$partie->getPseudo() ."</td>
                                    <td> ".$partie->getTime()." </td>
                                    <td>".$partie->getScore()."</td>
                                </tr>
                              ";
                        
                    }
                    echo "</table>";
                ?>
                
            </section>
        </body>
        <script type="text/javascript" src="src/Scorebaord.js"></script>

</html>