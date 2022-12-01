<?php

class ConnexionManager{

    public static function login(string $identifiant,string $password){
        $db = DatabaseManager::getInstance();
        $sql = "SELECT * FROM sae_garage.user WHERE id = :id;";
        $prepare = $db->prepare($sql);
        $prepare->bindParam(':id', $id, PDO::PARAM_INT);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $result = $prepare->fetchAll();
            if ($password !== $result[0]['password']) {
                header('connexion.php',);
            }else{
                $_SESSION["isConnected"] = true;
                if($result[0]["role"] == UserManager::ADMINISTRATEUR){
                    $_SESSION["role"] = UserManager::ADMINISTRATEUR;
                    render("AccueilAdmin.php");
                }else{
                    if($result[0]["role"] == UserManager::MANAGER){
                        $_SESSION["role"] = UserManager::MANAGER;
                    }elseif ($result[0]["role"] == UserManager::EMPLOYE){
                        $_SESSION["role"] = UserManager::EMPLOYE;
                    }
                    render("connexion.php");
                }
            }
            exit(0);
        }
    }
}