<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once dirname(dirname(dirname(__DIR__))) . '/vendor/autoload.php';

class MailService
{
    public function sendMail($email)
    {
        $mail = new PHPMailer(true);
        print_r($email);
        try {
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = getenv('MAIL_SHOP');
            $mail->Password   = getenv('MAIL_PASSWORD');
            $mail->SMTPDebug=0; 
            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587;
            $mail->setFrom(getenv('MAIL_SHOP'), 'Mailer');
            $mail->addAddress($email[0], $email[1]);
            $mail->isHTML(true);
            $mail->Subject = '[ FORM CONTACT from Blue Cosmetics ]';
            
            
            $mail->Body    = 'Helllo';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';            
            // call function send() of phpMailer
            $mail->send();
            echo 'Message has been sent';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }
}
