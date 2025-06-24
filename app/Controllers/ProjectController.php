<?php

namespace App\Controllers;

require_once '../app/Controllers/BaseController.php';

use App\Models\ProjectModel;

class ProjectController extends BaseController
{
    /**
     * Affiche la liste des projets
     */
    public function index(): void
{
    $model = new ProjectModel();

    // slug éventuel ?competence=xxx dans l’URL
    $selectedSlug = $_GET['competence'] ?? null;

    if ($selectedSlug) {
        // Projets filtrés
        $projects = $model->getProjectsByCompetence($selectedSlug);
    } else {
        // Tous les projets
        $projects = $model->getAll();
    }

    // Liste des compétences pour le menu
    $competences = $model->getAllCompetences();

    $this->render('projects/index.php', [
        'projects'       => $projects,
        'competences'    => $competences,
        'selectedSlug'   => $selectedSlug,
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

public function showByCompetence(string $slug): void
{
    $model = new ProjectModel();

    $competence = $model->getCompetenceBySlug($slug);
    if (!$competence) {
        http_response_code(404);
        echo "Compétence non trouvée.";
        exit;
    }

    $projects = $model->getProjectsByCompetence($slug);

    $this->render('projects/by_skill.php', [
        'competence' => $competence,
        'projects' => $projects,
    ]);
}

// ==================== COMPÉTENCES PROJET ====================

/** Affiche le formulaire de gestion des compétences d’un projet */
public function showManageCompetences(int $projectId): void
{
    if (!$this->isAdmin()) {
        $this->redirect('login-35f1d9a');
    }

    $model = new ProjectModel();

    $project             = $model->getById($projectId);
    $allCompetences      = $model->getAllCompetences();
    $selectedCompetenceIds = $model->getCompetenceIdsForProject($projectId);

    if (!$project) {
        echo "Projet introuvable.";
        return;
    }

    $this->render('admin/manage-competences.php', [
        'project'              => $project,
        'allCompetences'       => $allCompetences,
        'selectedCompetenceIds'=> $selectedCompetenceIds,
    ]);
}

/** Traite le POST et met à jour les compétences liées */
public function handleManageCompetences(int $projectId): void
{
    if (!$this->isAdmin()) {
        $this->redirect('login-35f1d9a');
    }

    $selectedIds = $_POST['competences'] ?? [];

    $model = new ProjectModel();
    $model->updateCompetences($projectId, $selectedIds);

    $this->redirect('dashboard-9f6cd1f');
}

}

