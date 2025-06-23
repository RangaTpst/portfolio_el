<?php include __DIR__ . '/../partials/header.php'; ?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/projetindex.css">

<main class="projects-page">
  <h1>Mes projets</h1>

  <div class="project-grid">
    <?php foreach ($projects as $project): ?>
      <div class="project-card-wrapper">
        <a href="<?= BASE_URL ?>projet/<?= htmlspecialchars($project['slug']) ?>" class="project-card">

          <?php
            // --- Chemin absolu sur le disque pour le test file_exists ---
            // -  Si ton site est installé à la racine du serveur, enlève “/portfolio_elisa”
            $imagePath = $_SERVER['DOCUMENT_ROOT'] .
                         '/portfolio_elisa/public/assets/images/projects/' .
                         $project['images'];

            // URL publique de l’image
            $imageUrl  = BASE_URL . 'assets/images/projects/' . htmlspecialchars($project['images']);
          ?>

          <?php if (!empty($project['images']) && file_exists($imagePath)): ?>
            <img src="<?= $imageUrl ?>" alt="Miniature de <?= htmlspecialchars($project['name']) ?>">
          <?php else: ?>
            <img src="<?= BASE_URL ?>assets/images/projects/default.jpg" alt="Miniature indisponible">
          <?php endif; ?>

          <div class="card-overlay">
            <h2><?= htmlspecialchars($project['name']) ?></h2>
            <p><strong>Compétence :</strong> <?= htmlspecialchars($project['competence'] ?? 'Non renseigné') ?></p>
            <p><strong>Tags :</strong> <?= htmlspecialchars($project['tags'] ?? 'Non renseigné') ?></p>
            <p><strong>Date :</strong> <?= isset($project['date_realisation']) ? htmlspecialchars($project['date_realisation']) : 'Date inconnue' ?></p>
            <?php if (!empty($project['pdf'])): ?>
              <p><em>PDF disponible</em></p>
            <?php endif; ?>
          </div>
              
        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>

<?php include __DIR__ . '/../partials/footer.php'; ?>
