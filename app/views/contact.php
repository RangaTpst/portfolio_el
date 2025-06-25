<?php include $partialsPath . '/header.php'; ?>
<?php ini_set('display_errors', 1);
error_reporting(E_ALL);?>
<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/contact.css">

<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<main class="contact-page">
  <section class="contact-container">
    
    <!-- Partie gauche - texte -->
    <div class="contact-text-section">
      <h2>Discutons de votre projet</h2>
      <p>
        Que vous soyez une petite entreprise, une startup ambitieuse ou un indépendant passionné, je suis là pour vous aider à construire une stratégie digitale à votre image.
      </p>
      <p>
        N'hésitez pas à me contacter via ce formulaire. Je réponds rapidement et avec le sourire !
      </p>
      <p>
        Et si vous souhaitez en savoir plus sur mon parcours, cochez simplement la case pour recevoir mon CV 😉
      </p>
    </div>

    <!-- Partie droite - formulaire -->
    <div class="contact-form-section">
      <h2>Me contacter</h2>
      <form method="POST" action="<?= BASE_URL ?>contact">
        <div class="form-row">
          <div class="form-group">
            <label for="last_name">Nom</label>
            <input type="text" id="last_name" name="last_name" required>
          </div>
          <div class="form-group">
            <label for="first_name">Prénom</label>
            <input type="text" id="first_name" name="first_name" required>
          </div>
        </div>

        <div class="form-group">
          <label for="company">Raison sociale</label>
          <input type="text" id="company" name="company">
        </div>

        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
          <label for="subject">Objet</label>
          <input type="text" id="subject" name="subject" required>
        </div>

        <div class="form-group">
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <div class="checkbox-group">
          <label>
            <input type="checkbox" name="send_cv" value="1">
            Je souhaite recevoir votre CV
          </label>
        </div>

        <button type="submit" class="contact-btn">Envoyer</button>
      </form>
    </div>

  </section>

  <!-- Carte -->
  <section class="contact-map-section">
    <h2>Où me trouver ?</h2>
    <div id="map"></div>
  </section>
</main>

<script>
  var map = L.map('map').setView([47.6559, -2.7603], 13);

  L.tileLayer('https://{s}.basemaps.cartocdn.com/light_all/{z}/{x}/{y}{r}.png', {
    attribution: '&copy; OpenStreetMap &copy; CARTO'
  }).addTo(map);

  L.marker([47.6559, -2.7603]).addTo(map)
    .bindPopup('Vannes, Bretagne')
    .openPopup();
</script>

<?php include $partialsPath . '/footer.php'; ?>
