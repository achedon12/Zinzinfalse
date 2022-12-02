<?php

require_once "../assets/php/classes/Partie.php";

class PartieManager{

    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getAllParties(): array{
        /** @var Partie[] $res */
        $res = [];
        $stmt = $this->pdo->query("SELECT * FROM partie");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = new Partie($row["no_partie"],$row["score"],$row["temps"],$row["pseudo"]);
        }
        return $res;
    }


}