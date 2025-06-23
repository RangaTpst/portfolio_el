<?php
namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

class Mailer
{
    public static function sendWithAttachment($to, $subject, $bodyText, $filePath)
{
    $mail = new PHPMailer(true);

    // Affichage brut à l'écran (utile en dev)
    echo "<pre>";

    try {


        $mail->isSMTP();
        $mail->Host       = 'ssl0.ovh.net';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'contact@elisa-pichon.fr';
        $mail->Password   = 'TON_MDP_ICI';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('contact@elisa-pichon.fr', 'Elisa Pichon');
        $mail->addAddress($to);

        $mail->isHTML(false);
        $mail->Subject = $subject;
        $mail->Body    = $bodyText;

        if (file_exists($filePath)) {
            $mail->addAttachment($filePath);
        }

        $mail->send();
        echo "✅ Email envoyé avec succès";

    } catch (Exception $e) {
        echo "❌ Erreur d'envoi : " . $mail->ErrorInfo;
    }

    echo "</pre>";
}

}
