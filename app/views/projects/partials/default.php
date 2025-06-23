<?php
$title = $project['name'];
$partialsPath = __DIR__ . '/../../partials/';
?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/projetindex.css">

<main class="projects-page">
  <h1>Oups !</h1>
  <p style="text-align: center; margin-bottom: 3rem;">
    La page de ce projet est en cours de création. Revenez bientôt pour en découvrir plus !
  </p>

  <h2 style="text-align: center; margin-bottom: 2rem;">Découvrez les autres projets disponibles</h2>

  <div class="project-grid">
    <?php foreach ($projects as $p): ?>
      <?php if ($p['slug'] !== $project['slug']): ?>
        <div class="project-card-wrapper">
          <a href="<?= BASE_URL ?>projet/<?= htmlspecialchars($p['slug']) ?>" class="project-card">
            <?php
              $imagePath = $_SERVER['DOCUMENT_ROOT'] .
                          '/portfolio_elisa/public/assets/images/projects/' .
                          $p['images'];
              $imageUrl = BASE_URL . 'assets/images/projects/' . htmlspecialchars($p['images']);
            ?>

            <?php if (!empty($p['images']) && file_exists($imagePath)): ?>
              <img src="<?= $imageUrl ?>" alt="Miniature de <?= htmlspecialchars($p['name']) ?>">
            <?php else: ?>
              <img src="<?= BASE_URL ?>assets/images/projects/default.jpg" alt="Miniature indisponible">
            <?php endif; ?>

            <div class="card-overlay">
              <h2><?= htmlspecialchars($p['name']) ?></h2>
              <p><strong>Compétence :</strong> <?= htmlspecialchars($p['competence'] ?? 'Non renseigné') ?></p>
              <p><strong>Tags :</strong> <?= htmlspecialchars($p['tags'] ?? 'Non renseigné') ?></p>
              <p><strong>Date :</strong> <?= isset($p['date_realisation']) ? htmlspecialchars($p['date_realisation']) : 'Date inconnue' ?></p>
              <?php if (!empty($p['pdf'])): ?>
                <p><em>PDF disponible</em></p>
              <?php endif; ?>
            </div>
          </a>
        </div>
      <?php endif; ?>
    <?php endforeach; ?>
  </div>
</main>

