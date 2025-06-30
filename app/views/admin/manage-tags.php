<?php require __DIR__ . '/../partials/header-admin.php'; ?>

<div class="container">
    <h1>Gérer les tags du projet : <strong><?= htmlspecialchars($project['name']) ?></strong></h1>

    <form action="<?= BASE_URL ?>admin/manage-tags/<?= $project['id'] ?>" method="post">
        <fieldset>
            <legend>Tags disponibles</legend>
            <?php foreach ($allTags as $tag): ?>
                <label>
                    <input type="checkbox" name="tags[]"
                           value="<?= $tag['id'] ?>"
                           <?= in_array($tag['id'], $selectedTags) ? 'checked' : '' ?>>
                    <?= htmlspecialchars($tag['name']) ?>
                </label><br>
            <?php endforeach; ?>
        </fieldset>

        <br>
        <button type="submit" class="btn">Enregistrer</button>
        <a href="<?= BASE_URL ?>/dashboard-9f6cd1f" class="btn-secondary">Annuler</a>
    </form>
</div>
