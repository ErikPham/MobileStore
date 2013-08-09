<?php

class Mail {

    private $mail;

    function __construct() {
        $this->mail = new PHPMailer();
        $config = require SITE_PATH . 'config/config.php';
        $configMail = $config['mail'];
        $this->mail->IsSMTP();
        $this->mail->Host = $configMail['Host'];
        $this->mail->SMTPDebug = $configMail['SMTPDebug'];
        $this->mail->SMTPAuth = $configMail['SMTPAuth'];
        $this->mail->SMTPSecure = $configMail['SMTPSecure'];
        $this->mail->Port = $configMail['Port'];
        $this->mail->Username = $configMail['Username'];
        $this->mail->Password = $configMail['Password'];
        $this->mail->SetFrom($configMail['SetFrom'][0], $configMail['SetFrom'][1]);
    }

    public function Send($email, $name, $subject, $body) {
        $this->mail->AddAddress($email, $name);
        $this->mail->Subject = $subject;
        $this->mail->CharSet = "utf-8";
        $this->mail->Body = $body;
        if ($this->mail->Send()) {
            $tmp = true;
        }
        return $tmp;
    }

}

?>
