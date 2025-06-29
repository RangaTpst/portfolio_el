<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <title><?= $title ?? "Portfolio d’Elisa" ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Portfolio de Elisa, spécialisée en webmarketing.">
  <!--<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/styles.css">-->
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/header.css">
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/footer.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
  <link rel="icon" href="<?= BASE_URL ?>favicon.ico" type="image/x-icon">


  <?php if (isset($isProjectPage) && $isProjectPage): ?>
  <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/project.css">
  <?php endif; ?>
  <script src="https://unpkg.com/lucide@latest"></script>

  <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-TCY5PKX7YL"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-TCY5PKX7YL');
</script>

</head>
<body style="display: flex; flex-direction: column; min-height: 100vh; margin: 0;">

<header>
  <nav class="navbar">
    <div class="nav-left">
      <a href="<?= BASE_URL ?>competences">Mes compétences</a>
      <a href="<?= BASE_URL ?>projets">Mes Projets</a>
    </div>

    <div class="nav-center">
      <button class="burger" id="burger">&#9776;</button>
      <a href="<?= BASE_URL ?>" class="logo">
        <img src="<?= BASE_URL ?>assets/images/photo/logo_site.svg" alt="Logo" />
      </a>
    </div>

    <div class="nav-right">
      <a href="<?= BASE_URL ?>contact">Me contacter</a>

      <form class="cv-form" method="POST" action="<?= BASE_URL ?>send-cv">
        <input type="email" name="email" placeholder="Votre e-mail" required
         pattern="^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$"
         oninvalid="this.setCustomValidity('Merci d’entrer un e-mail valide')"
         oninput="this.setCustomValidity('')">

        <div class="cv-button-wrapper">
          <button type="submit" id="cv-button">Mon CV</button>
          <div class="cv-popup">
            En cliquant sur <strong>"Mon CV"</strong>, vous acceptez de recevoir le CV par mail
            et vous acceptez la <a href="<?= BASE_URL ?>politique-confidentialite" target="_blank">politique de confidentialité</a>.
          </div>
        </div>
      </form>
    </div>
  </nav>
</header>
