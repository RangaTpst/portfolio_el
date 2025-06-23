<?php

namespace App\Models;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class CvModel
{
    public static function saveEmail($email)
{
    $pdo = require __DIR__ . '/../../config/bdd/database.php';

    // Vérifie si l'email existe déjà
    $stmt = $pdo->prepare("SELECT id FROM cv_emails WHERE email = ?");
    $stmt->execute([$email]);
    $id = $stmt->fetchColumn();

    if ($id) {
        // Met à jour la date d'envoi si l'email existe déjà
        $stmt = $pdo->prepare("UPDATE cv_emails SET sent_at = NOW() WHERE id = ?");
        $stmt->execute([$id]);
    } else {
        // Insère un nouvel enregistrement
        $stmt = $pdo->prepare("INSERT INTO cv_emails (email, sent_at) VALUES (?, NOW())");
        $stmt->execute([$email]);
    }
}


    public static function sendCvByEmail($email)
    {
        require_once __DIR__ . '/../../vendor/autoload.php';

        $mail = new PHPMailer(true);

        try {


            // Config SMTP (à adapter selon OVH Zimbra)
            $mail->isSMTP();
            $mail->Host = 'ssl0.ovh.net';
            $mail->SMTPAuth = true;
            $mail->Username = ''; // Ton adresse OVH
            $mail->Password = ''; // Mot de passe Zimbra
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
            $mail->CharSet = 'UTF-8';


            // Expéditeur / destinataire
            $mail->setFrom('contact@elisa-pichon.fr', 'Portfolio Elisa');
            $mail->addAddress($email);

            // Contenu de l'e-mail
$mail->isHTML(true);
$mail->Subject = 'Votre CV – Elisa Pichon';
$mail->Body = '
  <div style="background-color: #000; color: #fff; padding: 40px 30px; border-radius: 12px; font-family: sans-serif; max-width: 600px; margin: auto;">
    <h1 style="color:rgb(194, 0, 16); font-size: 26px; margin-bottom: 20px;">Votre demande a bien été prise en compte.</h1>

    <p style="font-size: 16px; line-height: 1.6;">
      Bonjour,
      <br><br>
      Comme promis, vous trouverez en pièce jointe mon CV.<br>
      Il présente mon parcours, mes compétences et mes expériences dans le webmarketing.
      <br><br>
      Merci pour votre intérêt !
    </p>

    <hr style="border: 0; border-top: 1px solid #444; margin: 30px 0;">

    <table style="width: 100%; text-align: left;">
      <tr>
        <td style="width: 60px;">
          <img src="https://webmarketing.elisa-pichon.fr/assets/images/photo/logo_site.svg" alt="Logo Elisa" style="width: 60px; height: auto; border-radius: 6px;">
        </td>
        <td style="padding-left: 15px; font-size: 14px; color: #ccc;">
          <strong style="color:rgb(194, 0, 16);">Elisa Pichon</strong><br>
          Webmarketing & stratégie digitale<br>
          <a href="https://webmarketing.elisa-pichon.fr" style="color: #fff; text-decoration: underline;">webmarketing.elisa-pichon.fr</a>
        </td>
      </tr>
    </table>
  </div>
';
// pièce jointe
$mail->addAttachment(__DIR__ . '/../../public/assets/images/cv_elisa-pichon.pdf');


$mail->AltBody = "Bonjour,\n\nVous trouverez mon CV en pièce jointe.\n\nElisa Pichon – www.elisa-pichon.fr";



            $mail->SMTPOptions = [
                'ssl' => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
                'allow_self_signed' => true,
    ]
];


            $mail->send();
        } catch (Exception $e) {
            echo "Erreur lors de l'envoi du mail : " . $mail->ErrorInfo;
        exit;
        }

    }
}
