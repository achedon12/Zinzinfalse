<!DOCTYPE html>
<?php
session_start();
?>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title>ZINZINFALSE</title>
        <meta name="ZINZINFALSE">
        <script type="text/javascript" src="lib/phaser.js"></script>
        <script type="text/javascript" src="src/Tableau1.js"></script>
        <script type="text/javascript" src="src/Tuto.js"></script>
        <script type="text/javascript" src="src/main.js"></script>
        <link rel="stylesheet" href="src/cssphaser.css">
    </head>
        <body>
            <div id="scores"><?php if (isset($_COOKIE['score'])) {echo $_COOKIE['score'] ;} else echo 0 ?></div>
            <div id="game"></div>
        </body>

</html>