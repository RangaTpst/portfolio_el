<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<?php require_once __DIR__ . '/../partials/header-admin.php'; ?>

<div class="container">
    <h1>Modifier le projet</h1>

    <form method="POST" action="<?= BASE_URL ?>admin/edit-project/<?= $project['slug'] ?>">

        <input type="hidden" name="id" value="<?= $project['id'] ?>">

        <input type="text" name="name" value="<?= htmlspecialchars($project['name'] ?? '') ?>" placeholder="Nom du projet" required>
        <input type="text" name="slug" value="<?= htmlspecialchars($project['slug'] ?? '') ?>" placeholder="Slug (url)" required>
        <input type="text" name="date_realisation" value="<?= htmlspecialchars($project['date_realisation'] ?? '') ?>" placeholder="Date de réalisation">
        <input type="text" name="pdf" value="<?= htmlspecialchars($project['pdf'] ?? '') ?>" placeholder="Lien PDF">
        <input type="text" name="images" value="<?= htmlspecialchars($project['images'] ?? '') ?>" placeholder="Lien image">
        <button type="submit" class="btn">Enregistrer les modifications</button>
    </form>
</div>
