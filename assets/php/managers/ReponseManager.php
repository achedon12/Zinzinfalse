<?php

require_once "assets/php/classes/Reponse.php";
require_once "assets/php/classes/Question.php";

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
            return new Reponse($row["no_reponse"],$row["question"],$row["libelle"]);
        }
        return null;
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