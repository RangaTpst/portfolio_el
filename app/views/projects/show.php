<?php 
$title = $project['name'];
$partialsPath = __DIR__ . '/partials/';
include __DIR__ . '/../partials/header.php';
?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/project.css">

<?php
// Vérifie si un fichier spécifique au slug existe dans /projects/partials/
$partialSlugFile = $partialsPath . $project['slug'] . '.php';

if (file_exists($partialSlugFile)) {
    include $partialSlugFile;
} else {
    include $partialsPath . 'default.php';
}
?>

<?php include __DIR__ . '/../partials/footer.php'; ?>
