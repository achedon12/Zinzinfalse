<?php
require_once __DIR__ . "/autoload.php";

if(session_status() == PHP_SESSION_NONE){
    session_start();
}
if(empty($_SESSION["questions"])){
    $questions = new QuestionManager(DatabaseManager::getInstance());
    $_SESSION['questions'] = $questions->getAllQuestions();
    $_SESSION['indice'] = 0;
    $_SESSION["score"] = 0;
}
if(!empty($_POST)){
    print_r($_POST);
    $_SESSION['indice'] ++;
    $dao = new ReponseManager(DatabaseManager::getInstance());
    $trueReponse = $dao->getTrueResponseFromAQuestion($_SESSION["questions"][$_SESSION["indice"]]->getLibelle());
    $flag = true;
    foreach ($_POST as $key => $value){
        if (!in_array($value,$trueReponse)){
            $flag = false;
        }
    }
    if ($flag){
        $_SESSION["score"] += $_SESSION["questions"][$_SESSION["indice"]]->getPoints();
    }
    $_POST = [];
    print_r($_SESSION["points"]);
}



?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>QUIZZ</title>
    <link rel="stylesheet" href="../css/quizz.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"
          integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>

    <h1>Tester vos connaissances !</h1>
    <section>
        <h2>Question à réponses multiples</h2>
        <article>
            <img src="../../Image/jaune-d-or-opalescent.jpg" alt="Exemple Image" />
        </article>
        <article class="question">
            <?php print_r($_SESSION["questions"][$_SESSION["indice"]]->toForm())?>
        </article>
    </section>


</body>