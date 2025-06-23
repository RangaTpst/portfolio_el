<?php

namespace App\Models;

use PDO;

class UserModel
{
    private $db;

    public function __construct()
    {
        // Charger la config
        $config = require __DIR__ . '/../../config/bdd/config.php';

        // Créer la connexion PDO
        $this->db = new PDO(
            "mysql:host={$config['db_host']};dbname={$config['db_name']};charset=utf8mb4",
            $config['db_user'],
            $config['db_pass'],
            [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
            ]
        );
    }

    /**
     * Récupère un utilisateur par son nom d'utilisateur
     */
    public function findByUsername($username)
    {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE username = :username LIMIT 1");
        $stmt->execute(['username' => $username]);
        return $stmt->fetch();
    }
}
