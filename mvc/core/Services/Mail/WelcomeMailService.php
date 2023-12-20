<?php
require_once "MailService.php";

class WelcomeMailService extends MailService{
    
    public function setBodyEmail()
    {
        $this->bodyEmail= "Welcome to the system";
    }
    
} 

?>