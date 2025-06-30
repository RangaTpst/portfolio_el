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

    public function getAllCompetences(): array
    {
        return $this->pdo
            ->query("SELECT id, name, slug FROM competences ORDER BY name")
            ->fetchAll();
    }

    public function getAllTags(): array
    {
        return $this->pdo
            ->query("SELECT id, name FROM tags ORDER BY name")
            ->fetchAll();
    }

    public function getBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public function getById(int $id): ?array
    {
        $stmt = $this->pdo->prepare("SELECT * FROM projects WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch() ?: null;
    }

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

    public function delete(int $id): bool
    {
        $stmt = $this->pdo->prepare("DELETE FROM projects WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public function getCompetenceBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM competences WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

    public function getTagBySlug(string $slug): ?array
    {
        $stmt = $this->pdo->prepare("SELECT id, name FROM tags WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetch() ?: null;
    }

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

    public function getTagIdsForProject(int $projectId): array
    {
        $stmt = $this->pdo->prepare("
            SELECT tag_id
            FROM project_tags
            WHERE project_id = ?
        ");
        $stmt->execute([$projectId]);
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function updateCompetences(int $projectId, array $competenceIds): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM project_competences WHERE project_id = ?");
        $stmt->execute([$projectId]);

        $stmt = $this->pdo->prepare("INSERT INTO project_competences (project_id, competence_id) VALUES (?, ?)");

        foreach ($competenceIds as $competenceId) {
            $stmt->execute([$projectId, $competenceId]);
        }
    }

    public function updateTags(int $projectId, array $tagIds): void
    {
        $stmt = $this->pdo->prepare("DELETE FROM project_tags WHERE project_id = ?");
        $stmt->execute([$projectId]);

        $stmt = $this->pdo->prepare("INSERT INTO project_tags (project_id, tag_id) VALUES (?, ?)");

        foreach ($tagIds as $tagId) {
            $stmt->execute([$projectId, $tagId]);
        }
    }
}
