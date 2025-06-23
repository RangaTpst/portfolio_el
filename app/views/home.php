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
      <h2>Qui suis-je ?</h2>
      <div class="profile-infos">
        <div class="detail-box"><i data-lucide="map-pin"></i>Vannes</div>
        <div class="detail-box"><i data-lucide="graduation-cap"></i>MyDigitalSchool</div>
        <div class="detail-box"><i data-lucide="calendar"></i>Âge : 23 ans</div>
        <div class="detail-box"><i data-lucide="message-square"></i>LV1 : Français</div>
        <div class="detail-box"><i data-lucide="message-square"></i>LV2 : Anglais</div>
      </div>
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
  ['Rigoureuse', 'check-circle'],
  ['Curieuse', 'search'],
  ['Positive', 'smile'],
  ['Empathique', 'heart-handshake']
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
       CENTRES D’INTÉRÊT
  ============================= -->
  <section id="interet" class="interets-section">
    <h2>Centres d’intérêt</h2>
    <div class="interets-wrapper">
      <div class="interets-carousel">
        <?php
          $interets = [
            ['palette', 'Design Graphique', 'Je conçois des visuels modernes et harmonieux.'],
            ['camera', 'Photographie', 'Capturer les instants du quotidien et les voyages.'],
            ['globe', 'Voyages', 'Explorer de nouvelles cultures m’inspire chaque jour.'],
            ['book-open', 'Lecture', 'Romans, essais marketing : toujours apprendre.'],
            ['music', 'Musique', 'La bande-son qui stimule ma créativité.'],
            ['pen-tool', 'Illustration', 'Dessin numérique pour donner vie à mes idées.']
          ];
          foreach ($interets as [$icon, $titre, $texte]) {
            echo "<div class='interet-item'>
                    <i data-lucide='{$icon}'></i>
                    <h3>{$titre}</h3>
                    <p>{$texte}</p>
                  </div>";
          }
        ?>
      </div>
    </div>
  </section>

  <!-- ============================
       FORMATIONS À VENIR
  ============================= -->
  <section id="form-futur" class="form-futur">
  <h2>Mes formations à venir</h2>

  <div class="formation-wrapper">
    <div class="formation-timeline">
      <?php
        $futur = [
          ['Sept. 2025', 'UX/UI Design', 'Approfondir la création d’interfaces centrées utilisateur.'],
          ['Oct. 2025', 'Dév. Front-End', 'Renforcer mes compétences HTML, CSS, JS et frameworks.'],
          ['Nov. 2025', 'Gestion de Projet', 'Découvrir les méthodes agiles et la coordination d\'équipe.'],
          ['Déc. 2025', 'SEO & Analytics', 'Optimiser la visibilité des projets et analyser leurs performances.']
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
          <span class="date">2023</span>
          <h3><i class="icon-graduation-cap"></i> Bachelor Webmarketing</h3>
          <p>MyDigitalSchool – Vannes<br>Spécialisation en stratégie digitale, UX, SEO, branding.</p>
        </div>
      </div>
      <div class="timeline-item right">
        <div class="content">
          <span class="date">2021</span>
          <h3><i class="icon-graduation-cap"></i> BTS Communication</h3>
          <p>Lycée Dupuy-de-Lôme – Lorient<br>Communication globale, médias, événementiel.</p>
        </div>
      </div>
      <div class="timeline-item left">
        <div class="content">
          <span class="date">2019</span>
          <h3><i class="icon-graduation-cap"></i> Bac STMG – Mercatique</h3>
          <p>Lycée Notre-Dame – Quimperlé<br>Marketing, droit, économie, gestion.</p>
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
        <a href="https://www.univ-ubs.fr" target="_blank">Université Bretagne Sud SSI</a>, Vannes</p>
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
        <a href="http://www.lycee-kerneuzec.fr" target="_blank">MDL Lycée de Kerneuzec</a>, Quimperlé</p>
      <ul>
        <li>Gestion de trésorerie</li>
        <li>Gestion administrative</li>
        <li>Mise en place d’événements</li>
        <li>Interventions auprès des lycéens</li>
      </ul>
    </div>
  </div>
</section>


</div>

<?php include $partialsPath . 'footer.php'; ?>
<script src="<?= BASE_URL ?>assets/js/main.js"></script>
