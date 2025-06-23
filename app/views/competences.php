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
      <div class="atout-item"><i class="lucide" data-lucide="chrome"></i><span>SEO<span></div>
      <div class="atout-item"><i class="lucide" data-lucide="cog"></i><span>CMS</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="file-chart-column-increasing"></i><span>Analyse Stratégique</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="instagram"></i><span>Création de contenus</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="clapperboard"></i><span>Production vidéo</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="pen-tool"></i><span>Production Graphique Web</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="lock-keyhole-open"></i><span>Stratégie Social-media</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="presentation"></i><span>Marketing digitale</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="braces"></i><span>JAVA</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="code-xml"></i><span>PYTHON</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="square-code"></i><span>HTML / CSS / JS</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="monitor"></i><span>Gestion de projets</span></div>

      <!-- Dupliquer pour boucle infinie -->
      <div class="atout-item"><i class="lucide" data-lucide="chrome"></i><span>SEO</span></div>
      <div class="atout-item"><i class="lucide" data-lucide="cog"></i><span>CMS</span></div>
    </div>
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
