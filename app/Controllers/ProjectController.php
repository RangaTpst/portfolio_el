<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    /**
     * Affiche la liste des projets
     */
    public function index()
    {
        $model = new ProjectModel();
        $projects = $model->getAll();

        $this->render('projects/index.php', [
            'projects' => $projects
        ]);
    }

    /**
     * Affiche un projet via son slug
     */
    public function show(string $slug)
{   
    $model = new ProjectModel();
    $project = $model->getBySlug($slug);

    if (!$project) {
        http_response_code(404);
        echo "Projet introuvable.";
        exit;
    }

    $competences = $model->getCompetencesForProject($project['id']);
    $tags = $model->getTagsForProject($project['id']);
    $projects = $model->getAll(); // ✅ pour le footer

    $this->render('projects/show.php', [
        'project' => $project,
        'competences' => $competences,
        'tags' => $tags,
        'projects' => $projects

    ]);
}


}
