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
            $stmt2 = $this->pdo->prepare("SELECT * FROM reponse where question=:question");
            $stmt2->bindParam(":question",$row["libelle"],PDO::PARAM_STR);
            $stmt2->execute();
            $reponses = [];
            foreach ($stmt2->fetchAll(PDO::FETCH_ASSOC) as $row2){
                $reponses[] = new Reponse($row2["no_reponse"],$row2["question"],$row2["libelle"],$row2["bonne_reponse"]);
            }
            $res[] = new Question($row["libelle"],$row["type"],$row["points"],$reponses);
        }
        return $res;
    }

    /**
     * Get randoms questions from a given number
     * @param int $number
     * @return array
     */
    public function getRandomQuestions(int $number): array{
        /** @var Question[] $array */
        $array = [];
        $questions = $this->getAllQuestions();
        while(sizeof($array) !== $number){
            $question = $questions[rand(0,sizeof($questions)-1)];
            if(!in_array($question->getLibelle(),$questions)){
                $array[] = $question;
            }
        }
        return $array;
    }

    public function getRandomQuestionsWhitePoints(int $pointsNumber, $questionNumber): array{
        /** @var Question[] $array */
        $array = [];
        foreach ($this->getAllQuestions() as $question){
            if($question->getPoints() == $pointsNumber){
                $array[] = $question;
            }
        }

        $res = [];

        while(sizeof($res) !== $questionNumber){
            $theQuestion = $array[rand(0,sizeof($array)-1)];
            if(!in_array($theQuestion->getLibelle(),$res)){
                $res[] = $theQuestion;
            }
        }
        return $res;
    }
}