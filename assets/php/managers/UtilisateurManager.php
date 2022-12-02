<?php
class UtilisateurManager{

    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createUtilisateur(string $pseudo, string $password, string $mail, string $validation=""): bool{
        if ($this->existUtilisateur($pseudo)){
            return false;
        }
        $stmt = $this->pdo->prepare("INSERT INTO utilisateur values(?,?,?,?)");
        $stmt->execute([
            $pseudo,
            $mail,
            $password,
            $validation
        ]);
        return true;
    }

    public function modifyUtilisateur(string $oldPseudo, Utilisateur $newUser): bool{
        if (!$this->existUtilisateur($oldPseudo)){
            return false;
        }
        $this->pdo->query("UPDATE utilisateur set pseudo= '{$newUser->getPseudo()}', mail='{$newUser->getMail()}', mdp='{$newUser->getMdp()}', validation='{$newUser->getValidation()}'");
        return true;
    }

    public function modifyValidation(Utilisateur $userNoValid): bool{
        $this->pdo->query("UPDATE utilisateur set validation ='' where pseudo='{$userNoValid->getPseudo()}'");
        return true;
    }

    public function existUtilisateur(string $pseudo): bool{
        if ($this->pdo->query("SELECT * FROM utilisateur WHERE pseudo = '$pseudo'")->rowCount() > 0)
            return true;
        return false;
    }

    public function deleteUtilisateur(string $pseudo): bool{
        if ($this->existUtilisateur($pseudo)){
            $stmt = $this->pdo->prepare("DELETE FROM utilisateur WHERE id = :pseudo");
            $stmt->execute([
                "pseudo" => $pseudo
            ]);
            return true;
        }
        return false;
    }

    public function getUtilisateur(string $pseudo): ?Utilisateur{
        $sql = "SELECT * FROM utilisateur WHERE pseudo = :pseudo";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':pseudo', $pseudo, PDO::PARAM_STR);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $result = $prepare->fetchAll();
            return new Utilisateur($result[0]["pseudo"],$result[0]["mail"],$result[0]["mdp"],$result[0]["validation"]);
        }
        return null;
    }
    public function getUtilisateurFromValid(string $validation): ?Utilisateur{
        $sql = "SELECT * FROM utilisateur WHERE validation = :validation";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':validation', $validation, PDO::PARAM_STR);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $result = $prepare->fetchAll();
            return new Utilisateur($result[0]["pseudo"],$result[0]["mail"],$result[0]["mdp"],$result[0]["validation"]);
        }
        return null;
    }

    public function getAllUtilisateurs(): array{
        /** @var Utilisateur[] $res */
        $res = [];
        $stmt = $this->pdo->query("SELECT * FROM utilisateur");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = new Utilisateur($row["pseudo"],$row["mail"],$row["mdp"],$row['validation']);
        }
        return $res;
    }


}