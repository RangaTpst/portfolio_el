<?php
// app/controllers/BaseController.php

namespace App\Controllers;

class BaseController
{
    public function __construct()
    {
        // Démarre la session automatiquement dans chaque contrôleur
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
    }

    protected string $partialsPath = '../app/views/partials/';


    protected function render($viewPath, $data = [])
    {
        // Extrait les données pour la vue
        extract($data);
        $partialsPath = $this->partialsPath;
        include '../app/views/' . $viewPath;
    }

    protected function isAdmin()
    {
        return isset($_SESSION['is_admin']) && $_SESSION['is_admin'] === true;
    }

    protected function redirect(string $path): void
{
    $base = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/') . '/';
    $url = $base . ltrim($path, '/');

    header("Location: $url");
    exit;
}


}
