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
        <ul>
            <?php foreach ($projects as $project) : ?>
                <li>
                    <?= htmlspecialchars($project['name']) ?>
                    <a href="<?= BASE_URL ?>admin/edit-project/<?= urlencode($project['slug']) ?>">Modifier</a>
                    <a href="<?= BASE_URL ?>admin/delete-project/<?= $project['id'] ?>" onclick="return confirm('Supprimer ce projet ?')">Supprimer</a>
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
