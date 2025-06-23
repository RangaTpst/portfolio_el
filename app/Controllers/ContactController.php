<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

use App\Models\ProjectModel;
use App\Models\ContactModel;

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
            'last_name'  => $_POST['last_name'] ?? '',
            'first_name' => $_POST['first_name'] ?? '',
            'company'    => $_POST['company'] ?? '',
            'email'      => $_POST['email'] ?? '',
            'message'    => $_POST['message'] ?? '',
        ];

        // Validation simple
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->redirect('/contact?error=email');
        }

        $model = new ContactModel();
        $success = $model->save($data);

        if ($success) {
            $this->redirect('/contact?success=1');
        } else {
            $this->redirect('/contact?error=server');
        }
    }
}
