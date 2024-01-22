<?php
require_once "MailService.php";

class WelcomeMailService extends MailService{
    
    public function setBodyEmail()
    {
        $this->bodyEmail = "<h3>Dear you!,</h3>\n";
        $this->bodyEmail .= "<h3>Welcome to our system! We are excited to have you on board.</h3>\n";
        $this->bodyEmail .= "<h4>Thank you for joining us!</h4>\n";
        $this->bodyEmail .= "Best regards!,";
    }
    
} 

?>