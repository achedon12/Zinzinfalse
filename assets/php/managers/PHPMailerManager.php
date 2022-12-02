<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class PHPMailerManager
{
    public static function sendAMail(string $email, string $username, string $validation){
        try{


            $mail = new PHPMailer(true);
            //Server settings
            //$mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = DatabaseManager::HOST;                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = DatabaseManager::MAIL_HOST;                     //SMTP username
            $mail->Password   = DatabaseManager::PASSWORD_HOST;                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;
            $mail->CharSet = "UTF-8";
            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
            var_dump(DatabaseManager::MAIL_HOST);
            //Recipients
            $mail->setFrom(DatabaseManager::MAIL_HOST, DatabaseManager::NAME_HOST);
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
            $mail->Body    = "Merci de vérifier votre compte avec ce lien : https://zinzinfalse.alwaysdata.net/views/connexion.php?code=$validation";
            //$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
            $mail->send();

        }catch (Exception $e){
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";

        }

    }
}