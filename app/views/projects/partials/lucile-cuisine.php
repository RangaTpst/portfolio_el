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

<section class="project-section">
  <div class="section-container">
    <div class="section-box">
      <h2>Extraits & rushs</h2>
      <div id="rushs-carousel" class="carousel-container">
        <div id="rushs-track" class="carousel-track">

          <!-- Slide 1 -->
          <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush1.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>

          <!-- Slide 2 -->
          <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush2.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>

          <!-- Slide 3 -->
          <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush3.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>
          <!-- Slide 4 -->
                    <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush4.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>
          <!-- Slide 5 -->
                    <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush5.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>
          <!-- Slide 6 -->
                    <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/projects/lucile-cuisine/rushs/rush6.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>
          <!-- Slide 7 -->
                    <div class="carousel-slide">
            <video controls>
              <source src="<?= BASE_URL ?>assets/videos/rushs/rush7.mp4" type="video/mp4">
              Votre navigateur ne supporte pas la lecture de cette vidéo.
            </video>
          </div>

        </div>

        <button class="carousel-btn prev">&#10094;</button>
        <button class="carousel-btn next">&#10095;</button>
      </div>
    </div>
  </div>
</section>


<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
