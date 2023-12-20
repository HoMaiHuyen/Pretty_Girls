<?php 
require_once dirname(__DIR__).'/core/Services/Mail/WelcomeMailService.php';
class MailController {
    public function index($params){
     $mail= new WelcomeMailService();
     $mail->setBodyEmail();
     $mail->sendMail([
        'email'=>'sang.ho25@student.passerellesnumeriques.org',
        'name'=>'Sang'
        ]);  
    }
}
?>