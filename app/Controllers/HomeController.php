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
}

