<?php

namespace App\Models;

use PDO;

class ProjectModel
{
    private PDO $pdo;

    public function __construct()
    {
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
    public function getAll(): array
    {
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

        return $this->pdo->query($sql)->fetchAll();
    }

    /**
     * Récupère toutes les compétences (ex: pour affichage sur la page d’accueil)
     */
    public function getAllCompetences(): array
    {
        return $this->pdo
            ->query("SELECT id, name, slug FROM competences ORDER BY name")
            ->fetchAll();
    }

    /**
     * Récupère un projet par son slug
     */
    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    /**
     * Récupère un projet par son ID
     */
    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

    /**
     * Récupère les compétences associées à un projet
     */
    public function getCompetencesForProject(int $projectId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT c.name 
            FROM competences c
            INNER JOIN project_competences pc ON pc.competence_id = c.id
            WHERE pc.project_id = ?
        ");
        $stmt->execute([$projectId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    /**
     * Récupère les tags associés à un projet
     */
    public function getTagsForProject(int $projectId): array
    {
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
    public function create(array $data): bool
    {
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
    public function update(int $id, array $data): bool
    {
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
    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }

    /**
     * Récupère une compétence via son slug
     */
    public function getCompetenceBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM competences WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    /**
     * Récupère tous les projets associés à une compétence (par slug)
     */
    public function getProjectsByCompetence(string $slug): array
    {
        $stmt = $this->pdo->prepare("
            SELECT p.* FROM projects p
            JOIN project_competences pc ON pc.project_id = p.id
            JOIN competences c ON c.id = pc.competence_id
            WHERE c.slug = ?
        ");
        $stmt->execute([$slug]);
        return $stmt->fetchAll();
    }

    /**
 * Récupère les IDs des compétences associées à un projet (utile pour les checkbox)
 */
public function getCompetenceIdsForProject(int $projectId): array
{
    $stmt = $this->pdo->prepare("
        SELECT competence_id
        FROM project_competences
        WHERE project_id = ?
    ");
    $stmt->execute([$projectId]);
    return $stmt->fetchAll(PDO::FETCH_COLUMN);
}

/**
 * Met à jour les compétences associées à un projet
 */
public function updateCompetences(int $projectId, array $competenceIds): void
{
    // Supprimer les associations existantes
    $stmt = $this->pdo->prepare("DELETE FROM project_competences WHERE project_id = ?");
    $stmt->execute([$projectId]);

    // Ajouter les nouvelles associations
    $stmt = $this->pdo->prepare("INSERT INTO project_competences (project_id, competence_id) VALUES (?, ?)");

    foreach ($competenceIds as $competenceId) {
        $stmt->execute([$projectId, $competenceId]);
    }
}

}
