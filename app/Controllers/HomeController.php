<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

use App\Models\HomeModel;
use App\Models\ProjectModel;

class HomeController extends BaseController
{
    public function index()
    {
        $homeModel = new HomeModel();
        $message = $homeModel->getWelcomeMessage();

        $projectModel = new ProjectModel();
        $projects = $projectModel->getAll();
        $skills = $projectModel->getAllCompetences(); // ✅ Appel correct

        $this->render('home.php', [
            'message' => $message,
            'projects' => $projects,
            'skills' => $skills
        ]);
    }

    public function about()
    {
        $this->render('about.php');
    }

    public function competences()
    {
        $this->render('competences.php');
    }
}
