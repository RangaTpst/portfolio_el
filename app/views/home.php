<?php 
$title = "Accueil - Portfolio Elisa";
$partialsPath = __DIR__ . '/partials/';
include $partialsPath . 'header.php'; 
?>
<link rel="stylesheet" href="assets/css/home.css">

<div class="about-page">

<!-- ============================
     PROFIL – QUI SUIS-JE
============================= -->

<section id="qui-suis-je" class="profile-banner">
  <div class="profile-banner-inner">
    <!-- Image bannière -->
    <div class="profile-background">
      <img src="<?= BASE_URL ?>assets/images/photo/banniere1.jpg" alt="Photo Elisa">
    </div>

    <!-- Bloc infos -->
    <div class="profile-overlay">
      <h1>Elisa Pichon </h1>
      <h2><br>Qui suis-je ?</h2>
      <div class="profile-infos">
        <div class="detail-box"><i data-lucide="map-pin"></i> Vannes</div>
        <div class="detail-box"><i data-lucide="graduation-cap"></i> Ecole : MyDigitalSchool</div>
        <div class="detail-box"><i data-lucide="calendar"></i> Âge : 21 ans</div>
        <div class="detail-box"><i data-lucide="message-square"></i> Anglais : TOEIC B2</div>
        <div class="detail-box"><i data-lucide="message-square"></i> Espagnol</div>
      </div>
    </div>
  </div>
</section>

<!-- ============================
     Stat décalé
============================= -->

<section class="stats-section">
  <div class="stats-container">
    <div class="stat-tile">
      <div class="stat-icon">🎧</div>
      <div class="stat-number">1240</div>
      <div class="stat-label">Heures d'écoute</div> 
    </div>
    <a href="<?= BASE_URL ?>projets" class="stat-link">
      <div class="stat-tile clickable">
        <div class="stat-icon">📁</div>
        <div class="stat-number"><?= count($projects) ?></div>
        <div class="stat-label">Projets réalisés</div>
      </div>
    </a>
    <div class="stat-tile">
      <div class="stat-icon">✏️</div>
      <div class="stat-number">42</div>
      <div class="stat-label">Crayons finis</div>
    </div>
  </div>
</section>




  <!-- ============================
       ATOUTS
  ============================= -->
  <section id="atouts" class="atouts-section">
    <h2>Mes atouts</h2>
    <div class="atouts-wrapper">
    <div class="atouts-carousel">
      <?php
        $atouts = [
  ['Créative', 'sparkles'],
  ['Ponctuelle', 'check-circle'],
  ['Curieuse', 'search'],
  ['Autonome', 'smile'],
  ['Empathique', 'heart-handshake'],
  ['Polyvalente', 'arrow-up-narrow-wide']
];

foreach (array_merge($atouts, $atouts) as [$label, $icon]) {
  echo "<div class='atout-item'>
          <i data-lucide='{$icon}'></i>
          <span>{$label}</span>
        </div>";
}
      ?>
    </div>
    </div>
  </section>

  <!-- ============================
       Compétences
  ============================= -->


<section class="skills-section">
  <h2>Mes compétences</h2>

  <div class="atouts-wrapper">  
    <div class="atouts-carousel hard-skills">
      <?php foreach ($skills as $skill): ?>
        <a href="<?= BASE_URL ?>projets?competence=<?= htmlspecialchars($skill['slug']) ?>" class="atout-item">
          <span><?= htmlspecialchars($skill['name']) ?></span>
        </a>
      <?php endforeach; ?>
    </div>
  </div>

  <div class="skills-btn-container">
    <a href="<?= BASE_URL ?>projets" class="btn-skills">Voir tous les projets</a>
  </div>
</section>







  <!-- ============================
       CENTRES D’INTÉRÊT
  ============================= -->
  <section class="interests-section">
  <h2>Mes centres d’intérêt</h2>
  <div class="interests-container">
    <div class="interest-tile reading">
      <span>Lecture</span>
    </div>
    <div class="interest-tile box">
      <span>Boxe</span>
    </div>
    <div class="interest-tile music">
      <span>Musique</span>
    </div>
    <div class="interest-tile selfdefense">
      <span>Self défense</span>
    </div>
  </div>
</section>


  <!-- ============================
       FORMATIONS À VENIR
  ============================= -->
  <section id="form-futur" class="form-futur">
  <h2>Ma formations à venir</h2>

  <div class="formation-wrapper">
    <div class="formation-timeline">
      <?php
        $futur = [
          ['Septembre 2025', 'MBA WebMarketing', 'Contact école : Sherley BURBAN <br>    
          06 27 87 02 68
          sherley.burban@mydigitalschool.com'],
        ];

        foreach ($futur as [$mois, $titre, $desc]) {
          echo "<div class='formation-step'>
                  <span class='mois'>{$mois}</span>
                  <h3>{$titre}</h3>
                  <p>{$desc}</p>
                </div>";
        }
      ?>
    </div>
  </div>
</section>


  <!-- ============================
       FORMATIONS & DIPLÔMES
  ============================= -->
  <section id="formations" class="formations-section">
    <h2>Formations & diplômes</h2>
    <div class="timeline">
      <div class="timeline-item left">
        <div class="content">
          <span class="date">2025</span>
          <h3><i class="icon-graduation-cap"></i> Bachelor Webmarketing & Social Medias</h3>
          <p>MyDigitalSchool – PLESCOP<br>Analyse stratégique, référencement SEO, .</p>
        </div>
      </div>
      <div class="timeline-item right">
        <div class="content">
          <span class="date">2024</span>
          <h3><i class="icon-graduation-cap"></i> Licence Mathématiques Informatique et Statistiques</h3>
          <p>Université Bretagne Sud - VANNES<br>Technologies Web, HTML/CSS/JavaScript, Java, Mathématiques Fondamentales</p>
        </div>
      </div>
      <div class="timeline-item left">
        <div class="content">
          <span class="date">2022</span>
          <h3><i class="icon-graduation-cap"></i> Baccalauréat général</h3>
          <p>Lycée de Kerneuzec – QUIMPERLE<br>Spécialités Numérique et Sciences de l’Informatique, Mathématiques et Physique-Chimie</p>
        </div>
      </div>
    </div>
  </section>

  <!-- ============================
       ENGAGEMENTS
  ============================= -->
<section class="engagements-section">
  <h2><i class="icon-heart" style="color: var(--red); margin-right: 0.5rem;"></i>Engagements</h2>
  
  <div class="engagements-timeline">
    <div class="engagement-item">
      <h3>🎓 Étudiante Ambassadrice</h3>  
      <p class="periode">De septembre 2023 à août 2024 – 
        <a href="https://www.univ-ubs.fr" target="_blank">Université Bretagne Sud SSI</a>, VANNES</p>
      <ul>
        <li>Contribuer au rayonnement de l’offre de formation de l’Université</li>
        <li>Interventions lors des JPO afin d’accompagner les lycéens</li>
        <li>Interventions lors de conférences</li>
        <li>Formation gestion du stress</li>
        <li>Formation prise de parole en public</li>
      </ul>
    </div>

    <div class="engagement-item">
      <h3>🏫 Présidente / Membre d’honneur / Trésorière</h3>
      <p class="periode">Depuis septembre 2020 – 
        <a href="http://www.lycee-kerneuzec.fr" target="_blank">MDL Lycée de Kerneuzec</a>, QUIMPERLE</p>
      <ul>
        <li>Gestion de trésorerie</li>
        <li>Gestion administrative</li>
        <li>Mise en place d’événements</li>
        <li>Interventions auprès des lycéens</li>
      </ul>
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



</div>

<?php include $partialsPath . 'footer.php'; ?>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
