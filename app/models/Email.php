<?php 
namespace App\models;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception as PHPMailerException;

class Email {

    const HOST = 'smtp.gmail.com';
    const USER = 'emailtestepaulodev@gmail.com';
    const PASS = 'Paulinho24*';
    const SECURE = 'TLS';
    const PORT = 587;
    const CHARSET = 'UTF-8';


    const FROM_EMAIL = 'emailtestepaulodev@gmail.com';
    const FROM_NAME = 'Paulo';

    private $error;
    
    /**
     * Exibe o erro
     *
     * @return string
     */
    public function getError() {
        return $this->error;
    }

    /**
     * Envia o email
     *
     * @param string/array $addresses
     * @param string $subject
     * @param string $body
     * @param string/array $atachments
     * @param string/array $ccs
     * @param string/array $bccs
     * @return void
     */
    public function sendEmail($addresses, $subject, $body, $attachments = [], $ccs = [], $bccs = []) {
        $this->error = '';

        $obMail = new PHPMailer(true);
        try {
            
            //Credenciais de acesso ao SMTP
            $obMail->isSMTP(true);
            $obMail->Host = self::HOST;
            $obMail->SMTPAuth = true;
            $obMail->Username = self::USER;
            $obMail->Password = self::PASS;
            $obMail->SMTPSecure = self::SECURE;
            $obMail->Port = self::PORT;
            $obMail->CharSet = self::CHARSET;

            //Remetente
            $obMail->setFrom(self::FROM_EMAIL, self::FROM_NAME);

            //Destinatários

            $addresses = is_array($addresses) ? $addresses : [$addresses];
            foreach($addresses as $address) {
                $obMail->addAddress($address);
            }

            $attachments = is_array($attachments) ? $attachments : [$attachments];
            foreach($attachments as $attachment) {
                $obMail->addAddress($attachment);
            }

            $ccs = is_array($ccs) ? $ccs : [$ccs];
            foreach($ccs as $cc) {
                $obMail->addAddress($cc);
            }

            $bccs = is_array($bccs) ? $bccs : [$bccs];
            foreach($bccs as $bcc) {
                $obMail->addAddress($bcc);
            }

            //Conteúdo do Email
            $obMail->isHTML(true);
            $obMail->Subject = $subject;
            $obMail->Body = $body;

            //Envia o Email
            return $obMail->send();

        } catch (PHPMailerException $e) {
            $this->error = $e->getMessage();
            return false;
        }

    }
}