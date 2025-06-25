<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';
require_once __DIR__ . '/../models/Mailer.php';
require_once __DIR__ . '/../models/CvModel.php';

use App\Models\ProjectModel;
use App\Models\ContactModel;
use App\Models\CvModel;

class ContactController extends BaseController
{
    /**
     * Affiche la page de contact avec le formulaire + projets (footer)
     */
    public function index()
    {
        $title = "Contact - Portfolio Elisa";
        $projectModel = new ProjectModel();
        $projects = $projectModel->getAll();

        // Exporte les données à la vue
        $this->render('contact.php', [
            'title' => $title,
            'projects' => $projects,
        ]);
    }

    /**
     * Traite le formulaire de contact
     */
    public function submit()
    {
        $data = [
            'last_name'   => $_POST['last_name'] ?? '',
            'first_name'  => $_POST['first_name'] ?? '',
            'company'     => $_POST['company'] ?? '',
            'email'       => $_POST['email'] ?? '',
            'subject'     => $_POST['subject'] ?? '',
            'message'     => $_POST['message'] ?? '',
            'send_cv'     => isset($_POST['send_cv']),
        ];

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirect('/contact?error=email');
        }

        // Phrase selon le choix d'envoi du CV
        $cvLine = $data['send_cv']
            ? "✅ La personne souhaite recevoir le CV."
            : "❌ La personne ne souhaite pas recevoir le CV.";

        // Corps du message
        $body = <<<EOD
📩 Nouveau message reçu depuis le formulaire de contact du portfolio :

👤 Nom : {$data['last_name']}
👤 Prénom : {$data['first_name']}
🏢 Raison sociale : {$data['company']}
✉️ Adresse e-mail : {$data['email']}
📝 Objet : {$data['subject']}

💬 Message :
{$data['message']}

$cvLine
EOD;

        // Chemin du CV
        $cvPath = __DIR__ . '/../public/assets/files/CV_Elisa.pdf';

        // 1. Envoi vers contact@elisa-pichon.fr
        \App\Models\Mailer::sendWithAttachment(
            'contact@elisa-pichon.fr',
            $data['subject'],
            $body,
            $data['send_cv'] ? $cvPath : null
        );

        // 2. Si demandé, on envoie aussi le CV au visiteur
        if ($data['send_cv']) {
            CvModel::sendCvByEmail($data['email']);
        }

        $this->redirect('/contact?success=1');
    }
}
