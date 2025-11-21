<?php 
namespace App\Models;

class Email{

    private $emailFrom;
    private $emailSubject;
    private $emailTo;
    private $emailContent;

     // emailFrom
    public function getEmailFrom() {
        return $this->emailFrom;
    }

    public function setEmailFrom($emailFrom) {
        $this->emailFrom = $emailFrom;
    }

    // emailSubject
    public function getEmailSubject() {
        return $this->emailSubject;
    }

    public function setEmailSubject($emailSubject) {
        $this->emailSubject = $emailSubject;
    }

    // emailTo
    public function getEmailTo() {
        return $this->emailTo;
    }

    public function setEmailTo($emailTo) {
        $this->emailTo = $emailTo;
    }

    // emailContent
    public function getEmailContent() {
        return $this->emailContent;
    }

    public function setEmailContent($emailContent) {
        $this->emailContent = $emailContent;
    }

}