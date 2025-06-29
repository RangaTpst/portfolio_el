<!-- PAGE Lucile Cuisine -->

<!-- Ajoute cette classe dans le <body> pour cibler cette page -->
<body class="project-lucile">

<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/project.css"> 

<!-- Fond elliptique figé -->
<div class="background-deco"></div>

<section class="project-hero" style="background: url('<?= BASE_URL ?>assets/images/projects/lucile-cuisine/lucile-hero.png') center 40% / cover no-repeat;">
  <div class="project-hero-content">
    <h1>Lucile Cuisine</h1>
    <p>Un projet vidéo pour valoriser les talents culinaires de Lucile dans une ambiance chaleureuse et authentique.</p>
  </div>
</section>

<section class="project-section">
  <div class="section-container">
    <div class="section-box contexte">
      <h2>Contexte</h2>
      <p>
        Lucile, passionnée de cuisine maison, souhaitait promouvoir ses créations culinaires à travers une vidéo inspirante.
        Le projet visait à capturer ses gestes, son univers, et l’essence du "fait maison" à travers un format dynamique et immersif.
      </p>
    </div>

    <div class="section-box objectifs">
      <h2>Objectifs</h2>
      <div class="objectifs-grid">
        <div class="objectif-card">
          <i class="lucide" data-lucide="video"></i>
          <span>Vidéo courte<br>impactante</span>
        </div>
        <div class="objectif-card">
          <i class="lucide" data-lucide="leaf"></i>
          <span>Valorisation<br>du fait maison</span>
        </div>
        <div class="objectif-card">
          <i class="lucide" data-lucide="camera"></i>
          <span>Ambiance<br>authentique</span>
        </div>
        <div class="objectif-card">
          <i class="lucide" data-lucide="share-2"></i>
          <span>Diffusion<br>réseaux sociaux</span>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="project-section">
  <div class="section-container">
    <div class="section-box">
      <h2>Vidéo finale</h2>
      <div class="video-wrapper">
        <video controls>
          <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/lucile-cuisine-final.mp4" type="video/mp4">
          Votre navigateur ne supporte pas la lecture vidéo.
        </video>
      </div>
    </div>
  </div>
</section>

<!-- ===== ALBUM PHOTO – Lucile Cuisine ===== -->
<section class="project-section">
  <div class="section-container">
    <div class="section-box">
      <h2>Album photos</h2>

      <div class="album-grid">
        <div class="album-item">
          <img src="<?= BASE_URL ?>assets/images/projects/lucile-cuisine/image1.png" alt="" loading="lazy">
        </div>
        <div class="album-item">
          <img src="<?= BASE_URL ?>assets/images/projects/lucile-cuisine/image2.png" alt="" loading="lazy">
        </div>
        <div class="album-item">
          <img src="<?= BASE_URL ?>assets/images/projects/lucile-cuisine/image3.png" alt="" loading="lazy">
        </div>
        <div class="album-item">
          <img src="<?= BASE_URL ?>assets/images/projects/lucile-cuisine/image4.png" alt="" loading="lazy">
        </div>
        <div class="album-item">
          <img src="<?= BASE_URL ?>assets/images/projects/lucile-cuisine/image5.png" alt="" loading="lazy">
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Icônes -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>

</body>
