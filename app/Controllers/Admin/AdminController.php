<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\UserModel;
use App\Models\ProjectModel;

class AdminController extends BaseController
{
    public function login()
    {
        if ($this->isAdmin()) {
            $this->redirect('dashboard-9f6cd1f');
        }

        $this->render('admin/login.php');
    }

    public function handleLogin()
    {
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new UserModel();
        $user = $userModel->findByUsername($username);

        if ($user && password_verify($password, $user['password']) && $user['is_admin']) {
            $_SESSION['is_admin'] = true;
            $_SESSION['user_id'] = $user['id'];
            $this->redirect('dashboard-9f6cd1f');
        } else {
            $this->redirect('login-35f1d9a?error=1');
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('login-35f1d9a');
    }

    public function dashboard()
    {
        if (!$this->isAdmin()) {
            $this->redirect('login-35f1d9a');
        }

        $projectModel = new ProjectModel();
        $projects = $projectModel->getAll();

        $this->render('admin/dashboard.php', [
            'projects' => $projects
        ]);
    }

    // --- CRUD Projects ---

    public function showAddForm()
    {
        if (!$this->isAdmin()) {
            $this->redirect('login-35f1d9a');
        }

        $this->render('admin/add-project.php');
    }

    public function handleAdd()
    {
        if (!$this->isAdmin()) {
            $this->redirect('login-35f1d9a');
        }

        $data = [
            'name' => $_POST['name'] ?? '',
            'slug' => $_POST['slug'] ?? '',
            'date_realisation' => $_POST['date_realisation'] ?? '',
            'pdf' => $_POST['pdf'] ?? '',
            'images' => $_POST['images'] ?? ''
        ];

        if (empty($data['name']) || empty($data['slug'])) {
            echo "Nom et slug sont requis.";
            return;
        }

        $model = new ProjectModel();
        $model->create($data);

        $this->redirect('dashboard-9f6cd1f');
    }

    public function showEditForm($slug)
{
    if (!$this->isAdmin()) {
        $this->redirect('login-35f1d9a');
    }

    $model = new ProjectModel();
    $project = $model->getBySlug($slug); //slug en bdd

    if (!$project) {
        echo "Projet introuvable.";
        return;
    }

    $this->render('admin/edit-project.php', ['project' => $project]);
}


public function handleEdit($slug)
{
    if (!$this->isAdmin()) {
        $this->redirect('login-35f1d9a');
    }

    $model = new ProjectModel();
    $project = $model->getBySlug($slug); // On récupère les infos du projet

    if (!$project) {
        echo "Projet introuvable."; 
        return;
    }

    $data = [
        'name' => $_POST['name'] ?? '',
        'slug' => $_POST['slug'] ?? '',
        'date_realisation' => $_POST['date_realisation'] ?? '',
        'pdf' => $_POST['pdf'] ?? '',
        'images' => $_POST['images'] ?? ''
    ];

    $model->update((int)$project['id'], $data); // ✅ On passe bien un entier ici

    $this->redirect('dashboard-9f6cd1f');
}


    public function delete($id)
    {
        if (!$this->isAdmin()) {
            $this->redirect('login-35f1d9a');
        }

        $model = new ProjectModel();
        $model->delete($id);

        $this->redirect('dashboard-9f6cd1f');
    }
}