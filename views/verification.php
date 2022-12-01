<?php
$code=$_GET['code'];
$user=$InscritDAO->getOneFromCode($code);

if($user){
    echo"<p class='message'>Bienvenue $user->login </p>";

    $user->validation="";

    $InscritDAO->update($user);
} else {
    echo"<p class='message'>Mais qui êtes-vous ?</p>";
}
?>
<!DOCTYPE html>

<head>
    <meta charset="UTF-8">
    <title>Page de Verification</title>
    <link rel="stylesheet" href="page_verif.css">
</head>
<body>
<h1>PAGE DE VERIFICATION</h1>
</body>
