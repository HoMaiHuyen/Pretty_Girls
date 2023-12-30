<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once  dirname(dirname(dirname(dirname(__DIR__)))) . '/vendor/autoload.php';

abstract class MailService
{
    protected $bodyEmail;
    public function sendMail($email)
    {
        $mail = new PHPMailer(true);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('MAIL_SHOP');
            $mail->Password   = getenv('MAIL_PASSWORD');
            $mail->SMTPDebug=0; 
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom(getenv('MAIL_SHOP'), 'Blue Cosmetics');
            $mail->addAddress($email['email'], $email['name']);
            $mail->isHTML(true);
            $mail->Subject = '[ FORM CONTACT from Blue Cosmetics ]';        
            $mail->Body    = $this->bodyEmail;
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
   abstract public function setBodyEmail();

   
}
