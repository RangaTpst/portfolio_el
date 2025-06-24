<?php include __DIR__ . '/../partials/header.php'; ?>

<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/projetindex.css">

<div class="site-wrapper"><!-- wrapper pour sticky footer si besoin -->

<main class="projects-page" id="main-content">
  <h1>Mes projets</h1>

  <!-- ===== FILTRE PAR COMPÉTENCE ===== -->
  <form class="projects-filter" method="get">
    <select name="competence" onchange="this.form.submit()">
      <option value="">-- Filtrer par compétence --</option>
      <?php foreach ($competences as $c): ?>
        <option value="<?= htmlspecialchars($c['slug']) ?>"
                <?= $selectedSlug === $c['slug'] ? 'selected' : '' ?>>
          <?= htmlspecialchars($c['name']) ?>
        </option>
      <?php endforeach; ?>
    </select>
    <noscript><button type="submit">Filtrer</button></noscript>
  </form>

  <!-- ===== GRILLE DE PROJETS ===== -->
  <div class="project-grid">
    <?php foreach ($projects as $project): ?>
      <div class="project-card-wrapper">
        <a href="<?= BASE_URL ?>projet/<?= htmlspecialchars($project['slug'], ENT_QUOTES, 'UTF-8') ?>" class="project-card">

          <?php
            $imageFileName = $project['images'] ?? '';
            $imagePath = $_SERVER['DOCUMENT_ROOT'] .
                         '/portfolio_elisa/public/assets/images/projects/' .
                         $imageFileName;

            $imageUrl = BASE_URL . 'assets/images/projects/' . rawurlencode($imageFileName);
          ?>

          <?php if (!empty($imageFileName) && file_exists($imagePath)): ?>
            <img src="<?= $imageUrl ?>" alt="Miniature de <?= htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8') ?>">
          <?php else: ?>
            <img src="<?= BASE_URL ?>assets/images/projects/default.jpg" alt="Miniature indisponible">
          <?php endif; ?>

          <div class="card-overlay">
            <h2><?= htmlspecialchars($project['name'], ENT_QUOTES, 'UTF-8') ?></h2>
            <p><strong>Compétence :</strong>
               <?= htmlspecialchars($project['competence'] ?? 'Non renseigné', ENT_QUOTES, 'UTF-8') ?></p>
            <p><strong>Date :</strong>
               <?= !empty($project['date_realisation'])
                    ? htmlspecialchars($project['date_realisation'], ENT_QUOTES, 'UTF-8')
                    : 'Date inconnue' ?></p>
            <?php if (!empty($project['pdf'])): ?>
              <p><em>PDF disponible</em></p>
            <?php endif; ?>
          </div>

        </a>
      </div>
    <?php endforeach; ?>
  </div>
</main>

</div><!-- .site-wrapper -->

<?php include __DIR__ . '/../partials/footer.php'; ?>
