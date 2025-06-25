<?php 
$title = "Compétences - Portfolio Elisa";
$partialsPath = __DIR__ . '/partials/';
include $partialsPath . 'header.php'; 
?>

<link rel="stylesheet" href="assets/css/home.css">

<main>  <!-- Ajouté ici -->

<section class="competences-section">
  <h2>Soft Skills</h2>
  <div class="atouts-wrapper">
    <div class="atouts-carousel soft-skills">
      <div class="atout-item"><i class="lucide" data-lucide="users"></i><span>Communication</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="heart-handshake"></i><span>Empathie</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="lightbulb"></i><span>Créativité</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="clock"></i><span>Gestion du temps</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="users"></i><span>Travail en équipe</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="notebook-pen"></i><span>Organisation</span></div>
      <!-- Dupliquer les items pour effet infini -->
      <div class="atout-item"><i class="lucide" data-lucide="users"></i><span>Communication</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="heart-handshake"></i><span>Empathie</span></div>
    </div>
  </div>

  <h2>Hard Skills</h2>
<div class="atouts-wrapper">  
  <div class="atouts-carousel hard-skills">
    <?php foreach ($skills as $skill): ?>
      <a href="<?= BASE_URL ?>projets?competence=<?= htmlspecialchars($skill['slug']) ?>" class="atout-item">
        <span><?= htmlspecialchars($skill['name']) ?></span>
      </a>
    <?php endforeach; ?>
  </div>
</div>

</section>

<section class="projects-carousel-section">
  <h2>Mes derniers projets</h2>

  <div class="projects-carousel-wrapper">
    <button class="carousel-arrow left" id="carousel-prev">&#10094;</button>

    <div class="projects-carousel" id="projects-carousel">
      <?php foreach ($projects as $project): ?>
        <a href="<?= BASE_URL ?>projet/<?= htmlspecialchars($project['slug']) ?>" class="project-slide">
          <img src="<?= BASE_URL ?>assets/images/projects/<?= htmlspecialchars($project['images']) ?>" alt="<?= htmlspecialchars($project['name']) ?>">
          <span><?= htmlspecialchars($project['name']) ?></span>
        </a>
      <?php endforeach; ?>
      <!-- Pas besoin de duplication car plus d’animation -->
    </div>

    <button class="carousel-arrow right" id="carousel-next">&#10095;</button>
  </div>
</section>

</main>  <!-- Fermeture du main -->

<?php include $partialsPath . 'footer.php'; ?>

<script src="https://unpkg.com/lucide@latest"></script>
<script>
  lucide.createIcons();

  // Pour pause au survol
  document.querySelectorAll('.atouts-carousel').forEach(carousel => {
    carousel.addEventListener('mouseenter', () => {
      carousel.style.animationPlayState = 'paused';
    });
    carousel.addEventListener('mouseleave', () => {
      carousel.style.animationPlayState = 'running';
    });
  });
</script>

<script src="<?= BASE_URL ?>assets/js/main.js"></script>
