<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<?php require_once __DIR__ . '/../partials/header-admin.php'; ?>

<div class="container">
    <h1>Ajouter un projet</h1>

    <form method="POST" action="<?= BASE_URL ?>admin/add-project">
        <input type="text" name="name" placeholder="Nom du projet" required>
        <input type="text" name="slug" placeholder="Slug (url)" required>
        <input type="text" name="date_realisation" placeholder="Date de réalisation">
        <input type="text" name="pdf" placeholder="Lien PDF">
        <input type="text" name="images" placeholder="Lien image">

        <button type="submit" class="btn">Créer le projet</button>
    </form>
</div>
