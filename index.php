
<?php

require "vendor/autoload.php";


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;


$developmentMode = true;
$mailer = new PHPMailer($developmentMode);

try {
    $mailer->SMTPDebug = 2;
    $mailer->isSMTP();

    if ($developmentMode) {
        $mailer->SMTPOptions = [
            'ssl'=> [
                'verify_peer' => false,
                'verify_peer_name' => false,
                'allow_self_signed' => true
            ]
        ];
    }


    $mailer->Host = 'smtp.gmail.com';
    $mailer->SMTPAuth = true;
    $mailer->Username = 'fitwenakattiyasetwenapanthiya@gmail.com';
    $mailer->Password = 'almathsseteka';
    $mailer->SMTPSecure = 'tls';
    $mailer->Port = 587;

    $mailer->setFrom('fitwenakattiyasetwenapanthiya@gmail.com', 'The ROBOT MAILER');
    $mailer->addAddress('mk.tms123@gmail.com', 'Adnan Hussain Turki');

    $mailer->isHTML(true);
    $mailer->Subject = 'myPHPnotes.com : PHPMailer Video Tutorial';
    $mailer->Body = 'Hello.....';

    $mailer->send();
    $mailer->ClearAllRecipients();
    echo "MAIL HAS BEEN SENT SUCCESSFULLY";

} catch (Exception $e) {
    echo "EMAIL SENDING FAILED. INFO: " . $mailer->ErrorInfo;
}
