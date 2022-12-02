<?php

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
<form method="post">
    <h1>Tester vos connaissances !</h1>
    <section>
        <h2>Question à réponses multiples</h2>
        <article>
            <img src="../../Image/jaune-d-or-opalescent.jpg" alt="Exemple Image" />
        </article>
        <article class="question">
            <label for="rep1">Question possible</label>
            <section>
                <input type="checkbox" id="rep1" name="rep1">
                <label for="rep1">Reponse 1</label>
                <input type="checkbox" id="rep2" name="rep2">
                <label for="rep2">Reponse 2</label>
                <input type="checkbox" id="rep3" name="rep3">
                <label for="rep3">Reponse 3</label>
                <input type="checkbox" id="rep4" name="rep4">
                <label for="rep4">Reponse 4</label>
                <input type="checkbox" id="rep5" name="rep5">
                <label for="rep5">Reponse 5</label>
            </section>
        </article>
    </section>
    <button type="submit"><i class="fa fa-caret-square-right"></i></button>
</form>
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