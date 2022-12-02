<?php

class ReponseManager{

    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }


    /**
     * Get a response from a question
     * @param string $question
     * @return ?Reponse
     */
    public function getResponseFromAQuestion(string $question): ?Reponse{
        $sql = "SELECT * FROM response WHERE question = :question";
        $prepare = $this->pdo->prepare($sql);
        $prepare->bindParam(':question', $question, PDO::PARAM_STR);
        $prepare->execute();
        if ($prepare->rowCount() > 0) {
            $row = $prepare->fetchAll();
            return new Reponse($row["no_reponse"],$row["question"],$row["libelle"],$row["bonne_reponse"]);
        }
        return null;
    }

    public function getTrueResponseFromAQuestion(string $question): ?Reponse{
        $sql = "SELECT * FROM response WHERE question = :question and bonne_reponse = :bonne_reponse";
        $prepare = $this->pdo->prepare($sql);
        $var = true;
        $res = [];
        $prepare->bindParam(':question', $question, PDO::PARAM_STR);
        $prepare->bindParam(':bonne_reponse', $var, PDO::PARAM_BOOL);
        $prepare->execute();
        foreach ($prepare->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = $row["no_reponse"];
        }
        return $res;
    }

    /**
     * Get all responses.
     * @return array
     */
    public function getAllResponses(): array{
        /** @var Reponse[] $res */
        $res = [];
        $stmt = $this->pdo->query("SELECT * FROM reponse");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = new Reponse($row["no_reponse"],$row["question"],$row["libelle"]);
        }
        return $res;
    }
}