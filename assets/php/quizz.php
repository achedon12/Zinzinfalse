<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

require_once "managers/QuestionManager.php";
require_once "database/DatabaseManager.php";

$questions = new QuestionManager(DatabaseManager::getInstance());

if (!isset($_Post['questions'])) {

    $_session['questions'] = $questions->getRandomQuestions(10);
}
print_r($_POST);
$_session['allQuestions'] = [];
$_session['indice'] = 0;
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
            <?php echo $_session["questions"][$_session["indice"]]->toForm();?>
        </article>
    </section>

<form method="post">
    <section>
        <h2>Question à réponse unique</h2>
        <article>
            <img src="../../Image/jaune-d-or-opalescent.jpg" alt="Exemple Image" />
        </article>
        <article class="question">
            <label for="question">Question possible</label>
            <section>
                <input type="radio" id="choix1" name="question" value="choix1">
                <label for="choix1">Reponse 1</label>
                <input type="radio" id="choix2" name="question" value="choix2">
                <label for="choix2">Reponse 2</label>
                <input type="radio" id="choix3" name="question" value="choix3">
                <label for="choix3">Reponse 3</label>
                <input type="radio" id="choix4" name="question" value="choix4">
                <label for="choix4">Reponse 4</label>
                <input type="radio" id="choix5" name="question" value="choix5">
                <label for="choix5">Reponse 5</label>
            </section>
        </article>
    </section>
    <button type="submit"><i class="fa fa-caret-square-right"></i></button>
</form>
</body>