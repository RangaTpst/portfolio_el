<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

use App\Models\HomeModel;
use App\Models\ProjectModel;

class HomeController extends BaseController
{
    public function index()
    {
        $model = new HomeModel();
        $message = $model->getWelcomeMessage();

        $projectModel = new ProjectModel();
        $projects = $projectModel->getAll();

        $this->render('home.php', [
            'message' => $message,
            'projects' => $projects
        ]);
    }
    public function about()
{
    $this->render('about.php');
}
public function competences()
{
    // Si tu as un modèle pour récupérer des données, tu peux le faire ici
    // Par exemple, récupérer des compétences hard/soft en BDD si besoin

    // Pour l’instant, on envoie juste à la vue sans données dynamiques
    $this->render('competences.php');
}

}

