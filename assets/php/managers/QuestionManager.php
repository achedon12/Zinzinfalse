<?php

class QuestionManager{

    private PDO $pdo;

    /**
     * @param PDO $pdo
     */
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Get all questions.
     * @return array
     */
    public function getAllQuestions(): array{
        /** @var Question[] $res */
        $res = [];
        $stmt = $this->pdo->query("SELECT * FROM question");
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            $res[] = new Reponse($row["libelle"],$row["type"],$row["points"]);
        }
        return $res;
    }

    /**
     * Get randoms questions from a given number
     * @param int $number
     * @return array
     */
    public function getRandomQuestions(int $number): array{
        $array = [];
        $questions = $this->getAllQuestions();
        while(sizeof($array) !== $number){
            $array[] = $questions[rand(0,sizeof($questions)-1)];
        }
        return $array;
    }
}