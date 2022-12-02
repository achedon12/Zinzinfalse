<?php

class ConnexionManager
{

    public static function login(string $identifiant, string $password)
    {
        $db = DatabaseManager::getInstance();
        $sql = "SELECT * FROM utilisateur WHERE pseudo = :id;";
        $prepare = $db->prepare($sql);
        $prepare->bindParam(':id', $identifiant, PDO::PARAM_STR);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $result = $prepare->fetchAll();
            if (!password_verify($password, $result[0]['mdp'])) {
                header('Location: connexion.php');
            } else {
                $_SESSION["isConnected"] = true;
                $_SESSION["role"] = $result[0]['pseudo'];
                header('Location: test.php');
            }
            exit(0);
        }
    }
}