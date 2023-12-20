<?php 
require_once dirname(__DIR__).'/core/Services/MailService.php';
class MailController {
    public function index($params){
     $mail= new MailService();
     $mail->sendMail($params);
       
    }
}

?>