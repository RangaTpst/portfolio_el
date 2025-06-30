<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProjectModel;

class AdminController extends BaseController
{
    /* ============ AUTH ============ */

    public function login()
    {
        if ($this->isAdmin()) { $this->redirect('dashboard-9f6cd1f'); }
        $this->render('admin/login.php');
    }

    public function handleLogin()
    {
        $u = $_POST['username'] ?? '';
        $p = $_POST['password'] ?? '';

        $user = (new UserModel())->findByUsername($u);

        if ($user && password_verify($p, $user['password']) && $user['is_admin']) {
            $_SESSION['is_admin'] = true;
            $_SESSION['user_id']  = $user['id'];
            $this->redirect('dashboard-9f6cd1f');
        }
        $this->redirect('login-35f1d9a?error=1');
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('login-35f1d9a');
    }

    /* ============ TABLEAU DE BORD ============ */

    public function dashboard()
    {
        $this->mustBeAdmin();
        $projects = (new ProjectModel())->getAll();
        $this->render('admin/dashboard.php', compact('projects'));
    }

    /* ============ CRUD PROJETS ============ */

    public function showAddForm()            { $this->mustBeAdmin(); $this->render('admin/add-project.php'); }
    public function showEditForm($slug)      { $this->mustBeAdmin(); $this->renderEdit($slug); }

    public function handleAdd()
    {
        $this->mustBeAdmin();
        $data = $this->collectProjectData();

        if (empty($data['name']) || empty($data['slug'])) {
            echo "Nom et slug requis.";
            return;
        }
        (new ProjectModel())->create($data);
        $this->redirect('dashboard-9f6cd1f');
    }

    public function handleEdit($slug)
    {
        $this->mustBeAdmin();
        $model   = new ProjectModel();
        $project = $model->getBySlug($slug) ?: $this->abortNotFound();

        $model->update((int)$project['id'], $this->collectProjectData());
        $this->redirect('dashboard-9f6cd1f');
    }

    public function delete($id)
    {
        $this->mustBeAdmin();
        (new ProjectModel())->delete($id);
        $this->redirect('dashboard-9f6cd1f');
    }

    /* ============ COMPÉTENCES ============ */

    public function showManageCompetences($id)
    {
        $this->mustBeAdmin();
        $model  = new ProjectModel();
        $project= $model->getById((int)$id) ?: $this->abortNotFound();

        $this->render('admin/manage-competences.php', [
            'project'              => $project,
            'allCompetences'       => $model->getAllCompetences(),
            'selectedCompetences'  => $model->getCompetenceIdsForProject((int)$id)
        ]);
    }

    public function handleManageCompetences($id)
    {
        $this->mustBeAdmin();
        (new ProjectModel())->updateCompetences((int)$id, $_POST['competences'] ?? []);
        $this->redirect('dashboard-9f6cd1f');
    }

    /* ============ TAGS +++ ============ */

    public function showManageTags($id)
    {
        $this->mustBeAdmin();
        $model   = new ProjectModel();
        $project = $model->getById((int)$id) ?: $this->abortNotFound();

        $this->render('admin/manage-tags.php', [
            'project'       => $project,
            'allTags'       => $model->getAllTags(),
            'selectedTags'  => $model->getTagIdsForProject((int)$id)
        ]);
    }

    public function handleManageTags($id)
    {
        $this->mustBeAdmin();
        (new ProjectModel())->updateTags((int)$id, $_POST['tags'] ?? []);
        $this->redirect('dashboard-9f6cd1f');
    }

    /* ============ HELPERS PRIVÉS ============ */

    private function collectProjectData(): array
    {
        return [
            'name'            => $_POST['name']            ?? '',
            'slug'            => $_POST['slug']            ?? '',
            'date_realisation'=> $_POST['date_realisation']?? '',
            'pdf'             => $_POST['pdf']             ?? '',
            'images'          => $_POST['images']          ?? ''
        ];
    }

    private function renderEdit(string $slug): void
    {
        $model   = new ProjectModel();
        $project = $model->getBySlug($slug) ?: $this->abortNotFound();
        $this->render('admin/edit-project.php', compact('project'));
    }

    private function abortNotFound()
    {
        http_response_code(404);
        exit('Projet introuvable.');
    }

    private function mustBeAdmin(): void
    {
        if (!$this->isAdmin()) { $this->redirect('login-35f1d9a'); }
    }
}
