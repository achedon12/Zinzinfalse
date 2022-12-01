<?php
//Import PHPMailer classes into the global namespace
//These must be at the top of your script, not inside a function
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

//Load Composer's autoloader
require './../vendor/autoload.php';
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../assets/css/inscription.css">
    <title>PageInscription</title>
</head>

<body>
    <form method="post">
        <h1>Inscrivez-vous</h1>

        <section>
            <h2>Nom d'utilisateur</h2>
            <input type="text" name="username" id="username" placeholder="Nom d'utilisateur" maxlength="8 required">
            <h2>Adresse mail</h2>

            <input type="email" name="email" id="mail" placeholder="Adresse e-mail">

            <h2>Mot de passe</h2>
            <input type="password" name="mdp" id="password" placeholder="Mot de passe">
        </section>

        <input type="submit" name="subButton" id="valider">

    </form>
    <?php
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);

    try {
        if (isset($_POST['subButton'])) {
            $username = isset($_POST['username'])?trim($_POST['username']):"";
            var_dump($username);
            $email = isset($_POST['email'])?trim($_POST['email']):"";
            $mdp = $_POST['mdp'] = isset($_POST['mdp'])?trim($_POST['mdp']):"";
            $verification = session_id();
            var_dump($verification);

            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp-zinzinfalse.alwaysdata.net';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'zinzinfalse@alwaysdata.net';                     //SMTP username
            $mail->Password   = 'zinzinfalse26!*';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom('zinzinfalse@alwaysdata.net', 'zinzinFalseAdmin');
            $mail->addAddress($email, $username);     //Add a recipient
            //$mail->addAddress('');               //Name is optional
            //$mail->addReplyTo('info@example.com', 'Information');
            //$mail->addCC('cc@example.com');
            //$mail->addBCC('bcc@example.com');

            //Attachments
            //$mail->addAttachment('/var/tmp/file.tar.gz');         //Add attachments
            //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    //Optional name

            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Email de verification';
            $mail->Body    = 'Cliquez sur ce lien pour <b>vérifier</b> votre email <br> La vérification est obligatoire pour continuer sur notre site internet';
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            if($mail->send()){
                echo 'Message has been sent';
            }

        }
    }catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

    ?>
</body>

</html>
