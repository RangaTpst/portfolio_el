<?php

namespace App\Models;

use PDO;

class ProjectModel {
    private $pdo;

    public function __construct() {
        $config = require __DIR__ . '/../../config/bdd/config.php';

        $this->pdo = new PDO(
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
     * Récupère tous les projets avec leurs tags et compétences
     */
    public function getAll(): array {
        $sql = "
            SELECT 
                p.id,
                p.name,
                p.slug,
                p.date_realisation,
                p.pdf,
                p.images,
                GROUP_CONCAT(DISTINCT t.name SEPARATOR ', ') AS tags,
                GROUP_CONCAT(DISTINCT c.name SEPARATOR ', ') AS competence
            FROM projects p
            LEFT JOIN project_tags pt ON p.id = pt.project_id
            LEFT JOIN tags t ON pt.tag_id = t.id
            LEFT JOIN project_competences pc ON p.id = pc.project_id
            LEFT JOIN competences c ON pc.competence_id = c.id
            GROUP BY p.id
            ORDER BY p.date_realisation DESC
        ";

        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll();
    }

    /**
     * Récupère un projet par son slug
     */
    public function getBySlug(string $slug): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE slug = ?");
        $stmt->execute([$slug]);
        $project = $stmt->fetch();
        return $project ?: null;
    }

    /**
     * Récupère un projet par son ID
     */
    public function getById(int $id): ?array {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        $project = $stmt->fetch();
        return $project ?: null;
    }

    /**
     * Récupère les compétences associées à un projet
     */
    public function getCompetencesForProject(int $projectId): array {
        $stmt = $this->pdo->prepare("
            SELECT c.name 
            FROM competences c
            INNER JOIN project_competences pc ON pc.competence_id = c.id
            WHERE pc.project_id = ?
        ");
        $stmt->execute([$projectId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN); // tableau simple de noms
    }

        /**
     * Récupère les tags associées à un projet
     */
    public function getTagsForProject(int $projectId): array {
    $stmt = $this->pdo->prepare("
        SELECT t.name
        FROM tags t
        INNER JOIN project_tags pt ON pt.tag_id = t.id
        WHERE pt.project_id = ?
    ");
    $stmt->execute([$projectId]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}


    /**
     * Crée un nouveau projet
     */
    public function create(array $data): bool {
        $stmt = $this->pdo->prepare("
            INSERT INTO projects (name, slug, date_realisation, pdf, images) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([
            $data['name'],
            $data['slug'],
            $data['date_realisation'],
            $data['pdf'],
            $data['images']
        ]);
    }

    /**
     * Met à jour un projet existant
     */
    public function update(int $id, array $data): bool {
        $stmt = $this->pdo->prepare("
            UPDATE projects 
            SET name = ?, slug = ?, date_realisation = ?, pdf = ?, images = ? 
            WHERE id = ?
        ");
        return $stmt->execute([
            $data['name'],
            $data['slug'],
            $data['date_realisation'],
            $data['pdf'],
            $data['images'],
            $id
        ]);
    }

    /**
     * Supprime un projet
     */
    public function delete(int $id): bool {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
