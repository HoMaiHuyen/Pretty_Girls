<?php
require_once "MailService.php";

class ChangStatusMail extends MailService{
    
    protected $userName;
    protected $newStatus;

    public function __construct($userName, $newStatus)
    {
        $this->userName = $userName;
        $this->newStatus = $newStatus;
    }

    public function setBodyEmail()
    {
        $this->bodyEmail = "<h3>Dear {$this->userName},</h3>\n";
        $this->bodyEmail .= "<h3>Your order status has been updated!</h3>\n";
        $this->bodyEmail .= "<p>Your order now has the status: <strong>{$this->newStatus}</strong></p>\n";
        $this->bodyEmail .= "<p>Thank you for choosing our service!</p>\n";
        $this->bodyEmail .= "Best regards!,";
    }
    
} 

?>