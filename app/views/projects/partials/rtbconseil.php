<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/project.css">
<div class="background-deco"></div>

<!-- HERO avec fond dynamique -->
<section class="project-hero" style="background: url('<?= BASE_URL ?>assets/images/projects/<?= $project['slug'] ?>/<?= $project['slug'] ?>-hero.jpg') center 20% / cover no-repeat;">

  <div class="project-hero-content">
    <h1></h1>
    <p></p>
  </div>
</section>

<!-- CONTEXTE + OBJECTIFS -->
<section class="project-section">
  <div class="section-container">
    <div class="section-box contexte">
      <h2>Contexte</h2>
      <p>
        RTB Conseil est une entreprise de conseil spécialisée dans les systèmes ERP, notamment SAP, ainsi que dans la cybersécurité.
        En 2024, l’entreprise a exprimé le besoin de refondre complètement son site vitrine afin de moderniser son image, clarifier son offre de services,
        et générer davantage de leads qualifiés via un meilleur référencement naturel.
        <br><br>
        Elisa a été missionnée en tant que cheffe de projet digitale pour piloter cette refonte. Elle a coordonné les besoins du client, élaboré les maquettes UX/UI,
        structuré les contenus, supervisé les développements techniques, et assuré le respect des délais et des objectifs fixés.
      </p>
    </div>

    <div class="section-box objectifs">
  <h2>Objectifs SMART</h2>
  <div class="smart-objectifs">

    <div class="smart-line orange">
      <div class="smart-num">01.</div>
      <div class="smart-text">
        <strong>Atteindre 25 téléchargements de notre livre blanc en 2 mois</strong>
        <small>Nombre de téléchargements en 2 mois</small>
      </div>
    </div>

    <div class="smart-line blue">
      <div class="smart-num">02.</div>
      <div class="smart-text">
        <strong>Atteindre un taux de conversion de 15% via LinkedIn et l’emailing</strong>
        <small>Taux de conversion = Interactions / vues</small>
      </div>
    </div>

    <div class="smart-line teal">
      <div class="smart-num">03.</div>
      <div class="smart-text">
        <strong>Attirer 75 nouveaux visiteurs mensuels sur le site d’ici 2 mois</strong>
        <small>Nombre de visiteurs simples / uniques</small>
      </div>
    </div>

    <div class="smart-line orange-light">
      <div class="smart-num">04.</div>
      <div class="smart-text">
        <strong>Atteindre les 50 interactions avec la presse en ligne en 2 mois</strong>
        <small>Nombre d’interactions presse / impressions</small>
      </div>
    </div>

  </div>
</div>
  </div>
</section>

<!-- COLLAB -->
<section class="brand-collab">
  <div class="brand-wrapper">
    <img src="<?= BASE_URL ?>assets/images/projects/<?= $project['slug'] ?>/logo-rtbconseil_B.png" alt="Logo RTB Conseil">
  </div>
</section>

<script src="https://unpkg.com/lucide@latest"></script>
<script>lucide.createIcons();</script>

<!-- ACCORDÉON 1 : Diagnostique marketing -->
<section class="accordion-section">
  <h2>Diagnostique marketing</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button class="accordion-title">SWOT <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/swot_rtb.png" alt="SWOT">
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-title">Mix marketing – 4P <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <p>Produit, Prix, Place, Promotion : analyse du mix marketing actuel de RTB Conseil.</p>
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-title">PESTEL <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/pestel_rtb.png" alt="PESTEL">
      </div>
    </div>
  </div>
</section>

<!-- ACCORDÉON 2 : Étude de marché -->
<section class="accordion-section">
  <h2>Étude de marché</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button class="accordion-title">Positionnement <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <p>Positionnement de RTB Conseil par rapport à ses concurrents sur les services ERP et cybersécurité.</p>
      </div>
    </div>
    <div class="accordion-item">
  <button class="accordion-title">Concurrents <span class="accordion-icon">+</span></button>
  <div class="accordion-content">
    <div class="table-wrapper">
      <table class="concurrents-table">
        <thead>
          <tr>
            <th>Nom du concurrent</th>
            <th>Positionnement</th>
            <th>Forces principales</th>
            <th>Faiblesses principales</th>
            <th>Abonnés LinkedIn</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>SOA People</strong></td>
            <td>Pure player SAP (migration, maintenance, projets spécifiques)</td>
            <td>Spécialisation SAP, bonne image dans l’écosystème</td>
            <td>Image plus orientée “industrie lourde” que services sur-mesure</td>
            <td>15K</td>
          </tr>
          <tr>
            <td><strong>TNP Consultants</strong></td>
            <td>Conseil en transformation digitale, focus ERP & SI</td>
            <td>Expertise en migration SAP S/4HANA, approche agile</td>
            <td>Moins connu, ce n’est pas leur activité principale</td>
            <td>32K</td>
          </tr>
          <tr>
            <td><strong>TeamWork</strong></td>
            <td>Conseil IT, SAP, cloud et data</td>
            <td>Large couverture technique (SAP, AWS, Salesforce)</td>
            <td>Image de société plus technique que conseil de proximité</td>
            <td>–</td>
          </tr>
          <tr>
            <td><strong>VISEO</strong></td>
            <td>Cabinet international en transformation digitale et SAP</td>
            <td>Forte capacité projet (grands comptes), présence internationale</td>
            <td>Moins agile pour les projets moyens ou spécifiques, parfois jugé trop “industriel” dans l'approche</td>
            <td>156K</td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>

    <div class="accordion-item">
      <button class="accordion-title">Benchmark <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/bench_rtb.png" alt="BENCHMARK">
      </div>
    </div>
  </div>
</section>

<!-- ACCORDÉON 3 : Ciblage -->
<section class="accordion-section">
  <h2>Ciblage</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button class="accordion-title">Cible principale <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/cible_rtb.png" alt="CIBLE">
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-title">Persona 1 + CJM <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/persona1.png" alt="P1">
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-title">Persona 2 + CJM <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/persona2.png" alt="P2">
      </div>
    </div>
    <div class="accordion-item">
      <button class="accordion-title">Persona 3 + CJM <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/persona3.png" alt="P3">
      </div>
    </div>
  </div>
</section>

<!-- ACCORDÉON 4 : Objectifs -->
<section class="accordion-section">
  <h2>Objectifs</h2>
  <div class="accordion">
    <div class="accordion-item">
      <button class="accordion-title">Objectif général <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <img src="<?= BASE_URL ?>assets/images/projects/rtbconseil/objectif_rtb.png" alt="objectifs">
    </div>
    <div class="accordion-item">
      <button class="accordion-title">Leviers & KPI <span class="accordion-icon">+</span></button>
      <div class="accordion-content">
        <p>
          Leviers : SEO, ergonomie, contenus ciblés, CTA efficaces.<br>
          KPI : taux de rebond, durée de session, nombre de formulaires remplis, trafic organique.
        </p>
      </div>
    </div>
  </div>
</section>

<section class="en-savoir-plus">
  <div class="en-savoir-container">
    <h2>Envie d’en savoir plus ?</h2>
    <p>Téléchargez mon rapport complet au format PDF pour découvrir tous les détails du projet.</p>
    <a href="<?= BASE_URL ?>assets/doc/MDP-RTB CONSEIL-Dossier individuel.pdf" class="download-btn" target="_blank" rel="noopener noreferrer" download>
      Télécharger le PDF
    </a>
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

<script src="<?= BASE_URL ?>assets/js/main.js"></script>
