<?php

require_once "Partie.php";

Class PartieManager{



    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function createPartie(int $score, string $temps,string $pseudo): bool{
        $stmt = $this->pdo->prepare("INSERT INTO partie(score,temps,pseudo) values(?,?,?)");
        $stmt->execute([
            $score,
            $temps,
            $pseudo
        ]);
        return true;
    }


    public function existNoPartie(string $no_partie): bool{
        if ($this->pdo->query("SELECT * FROM partie WHERE no_parie = '$no_partie'")->rowCount() > 0)
            return true;
        return false;
    }

    public function deletePartie(string $no_partie): bool{
        if ($this->existNoPartie($no_partie)){
            $stmt = $this->pdo->prepare("DELETE FROM partie WHERE no_partie = :no_partie");
            $stmt->execute([
                "no_partie" => $no_partie
            ]);
            return true;
        }
        return false;
    }

    public function getPartie(string $no_partie): ?Partie{
        $sql = "SELECT * FROM partie WHERE $no_partie = :no_partie";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':no_partie', $no_partie, PDO::PARAM_STR);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $result = $prepare->fetchAll();
            return new Partie($result[0]["no_partie"],$result[0]["score"],$result[0]["temps"],$result[0]["pseudo"]);
        }
        return null;
    }

    public function getAllPartie(): array{
        /** @var Utilisateur[] $res */
        $res = [];
        $stmt = $this->pdo->query("SELECT * FROM partie");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = new Partie($row["no_partie"],$row["score"],$row["temps"],$row['pseudo']);
        }
        return $res;
    }
}
