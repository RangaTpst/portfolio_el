<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mailer
{
    public static function sendWithAttachment($to, $subject, $bodyText, $filePath = null): bool
{
    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->Host       = 'ssl0.ovh.net';
        $mail->SMTPAuth   = true;
        $mail->SMTPOptions = [ # a enlever en prod
    'ssl' => [                           
        'verify_peer'       => false,
        'verify_peer_name'  => false,
        'allow_self_signed' => true
    ]
];
        $mail->Username   = 'fbgehzfuhegfvbeshzjfvb';
        $mail->Password   = '@gruejghjrekgbhrjkg';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('contact@elisa-pichon.fr', 'Elisa Pichon');
        $mail->addAddress($to);

        $mail->CharSet = 'UTF-8';
        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $bodyText;

        if ($filePath && file_exists($filePath)) {
            $mail->addAttachment($filePath);
        }

        $mail->send();
        error_log("✅ Mail envoyé à $to ($subject)");
        return true;

    } catch (Exception $e) {
        error_log("❌ Mailer error : ".$mail->ErrorInfo);
        return false;
    }
}


}
