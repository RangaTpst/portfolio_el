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
  <h2>Objectifs SMART</h2>
  <div class="smart-objectifs">

    <div class="smart-line orange">
      <div class="smart-num">01.</div>
      <div class="smart-text">
        <strong>Obtenir 300 vues sur la vidéo en 7 jours</strong>
        <small>Améliorer la visibilité des ateliers dans la région de Nantes</small>
      </div>
    </div>

    <div class="smart-line blue">
      <div class="smart-num">02.</div>
      <div class="smart-text">
        <strong>Recevoir 30 likes, 5 commentaires et 5 partages en 5 jours</strong>
        <small>Créer de l’interaction autour du contenu publié</small>
      </div>
    </div>

    <div class="smart-line teal">
      <div class="smart-num">03.</div>
      <div class="smart-text">
        <strong>Générer 3 inscriptions à un atelier via le lien en bio en 10 jours</strong>
        <small>Conversions directes depuis Instagram</small>
      </div>
    </div>

    <div class="smart-line orange-light">
      <div class="smart-num">04.</div>
      <div class="smart-text">
        <strong>Gagner 15 abonnés sur Instagram en 7 jours</strong>
        <small>Croissance ciblée auprès des personnes intéressées par la cuisine locale</small>
      </div>
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

<!-- Icônes -->
<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>

</body>
