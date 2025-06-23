<?php

use Core\Router;
use App\Controllers\HomeController;
use App\Controllers\ProjectController;
use App\Controllers\ContactController;
use App\Controllers\LegalController;
use App\Controllers\Admin\AdminController;
use App\Controllers\SitemapController;
use App\Controllers\CvController;


$router = new Router();

// Accueil
$router->get('/', function () {
    (new HomeController())->index();
});

// Projets
$router->get('/projets', function () {
    (new ProjectController())->index();
});

$router->get('/projet/{slug}', function ($slug) {
    (new ProjectController())->show($slug);
});


// Contact
$router->get('/contact', function () {
    (new ContactController())->index();
});
$router->post('/contact', function () {
    (new ContactController())->submit();
});

//competences
$router->get('/competences', function () {
    (new HomeController())->competences();
});


// Admin

// Affiche le formulaire de login
$router->get('/login-35f1d9a', function () {
    (new AdminController())->login();
});

// Traite le formulaire de login
$router->post('/process-login-4e7b20d', function () {
    (new AdminController())->handleLogin();
});

// Déconnexion
$router->get('/logout-86baac2', function () {
    (new AdminController())->logout();
});

// Dashboard admin (protégé par session)
$router->get('/dashboard-9f6cd1f', function () {
    (new AdminController())->dashboard();
});

// CRUD Projets

// Ajouter un projet
$router->get('/admin/add-project', function () {
    (new AdminController())->showAddForm();
});
$router->post('/admin/add-project', function () {
    (new AdminController())->handleAdd();
});

// Modifier un projet (avec slug dynamique)
$router->get('/admin/edit-project/{slug}', function ($slug) {
    (new AdminController())->showEditForm($slug);
});
$router->post('/admin/edit-project/{slug}', function ($slug) {
    (new AdminController())->handleEdit($slug);
});

// Supprimer un projet (par id ou slug au choix)
$router->get('/admin/delete-project/{id}', function ($id) {
    (new AdminController())->delete($id);
});

// page a_propo
$router->get('/about', function () {
    (new \App\Controllers\HomeController())->about();
});

// Mentions légales
$router->get('/mentions-legales', function () {
    (new LegalController())->mentions();
});

// Politique de confidentialité
$router->get('/politique-confidentialite', function () {
    (new LegalController())->privacy();
});

// Plan du site
$router->get('/plan-du-site', function () {
    (new LegalController())->sitemap();
});

$router->get('/sitemap.xml', function () {
    (new SitemapController())->index();
});

$router->post('/send-cv', function() {
    (new CvController())->send();
});




return $router;
