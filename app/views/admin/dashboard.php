<?php
// dashboard.php

// Inclure le header (partie HEAD + NAV)
require_once __DIR__ . '/../partials/header-admin.php';
?>

<div class="container">
    <h1>Dashboard Admin</h1>

    <h2>Liste des projets</h2>

    <a href="<?= BASE_URL ?>admin/add-project" class="btn">Ajouter un projet</a>

    <?php if (!empty($projects)) : ?>   
        <ul class="project-list">
            <?php foreach ($projects as $project) : ?>
                <li class="project-item">
                    <strong><?= htmlspecialchars($project['name']) ?></strong><br>

                    <span class="small-label">Compétences :</span>
                    <?php if (!empty($project['competence'])): ?>
                        <?= htmlspecialchars($project['competence']) ?>
                    <?php else: ?>
                        <em>Aucune</em>
                    <?php endif; ?>
                    <br>

                    <span class="small-label">Tags :</span>
                    <?php if (!empty($project['tags'])): ?>
                        <?= htmlspecialchars($project['tags']) ?>
                    <?php else: ?>
                        <em>Aucun</em>
                    <?php endif; ?>
                    <br>

                    <a href="<?= BASE_URL ?>admin/edit-project/<?= urlencode($project['slug']) ?>">Modifier</a> |
                    <a href="<?= BASE_URL ?>admin/delete-project/<?= $project['id'] ?>" onclick="return confirm('Supprimer ce projet ?')">Supprimer</a> |
                    <a href="<?= BASE_URL ?>admin/manage-competences/<?= $project['id'] ?>">Gérer les compétences</a> |
                    <a href="<?= BASE_URL ?>admin/manage-tags/<?= $project['id'] ?>">Gérer les tags</a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php else : ?>
        <p>Aucun projet pour le moment.</p>
    <?php endif; ?>
</div>

<?php
// Footer si besoin plus tard
?>
