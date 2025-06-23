<?php include $partialsPath . '/header.php'; ?>

<link rel="stylesheet" href="<?= BASE_URL ?>assets/css/contact.css">

<!-- Leaflet -->
<link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet/dist/leaflet.js"></script>

<main class="contact-page">

  <section class="contact-container">
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
          <label for="message">Message</label>
          <textarea id="message" name="message" rows="5" required></textarea>
        </div>

        <button type="submit" class="contact-btn">Envoyer</button>
      </form>
    </div>

    <div class="contact-map-section">
      <h2>Où me trouver ?</h2>
      <div id="map" style="height: 300px; border-radius: 12px; overflow: hidden;"></div>
    </div>
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
