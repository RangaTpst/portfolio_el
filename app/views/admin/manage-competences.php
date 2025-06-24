<?php require_once __DIR__ . '/../partials/header-admin.php'; ?>

<div class="container">
    <h1>Gérer les compétences du projet : <?= htmlspecialchars($project['name']) ?></h1>

    <form action="<?= BASE_URL ?>admin/manage-competences/<?= $project['id'] ?>" method="POST">
        <div class="checkbox-list">
            <?php foreach ($allCompetences as $competence) : ?>
                <label class="checkbox-item">
                    <input type="checkbox" name="competences[]" value="<?= $competence['id'] ?>"
                        <?= in_array($competence['id'], $selectedCompetences) ? 'checked' : '' ?>>
                    <?= htmlspecialchars($competence['name']) ?>
                </label>
            <?php endforeach; ?>
        </div>

        <button type="submit" class="btn">Enregistrer les compétences</button>
        <a href="<?= BASE_URL ?>/dashboard-9f6cd1f" class="btn btn-secondary">Retour</a>
    </form>
</div>

<style>
    .checkbox-list {
        margin-top: 2rem;
        display: flex;
        flex-direction: column;
        gap: 0.8rem;
        color: black;
    }

    .checkbox-item {
        display: flex;
        align-items: center;
        font-size: 1rem;
        color: black;
    }

    .checkbox-item input {
        margin-right: 0.8rem;
    }

    .btn {
        margin-top: 2rem;
        background-color: #ff4081;
        color: white;
        padding: 0.7rem 1.2rem;
        border: none;
        border-radius: 4px;
        font-weight: bold;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-secondary {
        background-color: #444;
        margin-left: 1rem;
    }

    .btn:hover {
        opacity: 0.9;
    }
</style>
