<?php 
$title = "A propos - Portfolio Elisa";
$partialsPath = __DIR__ . '/partials/';
include $partialsPath . 'header.php'; 
?>
<link rel="stylesheet" href="assets/css/about.css">

<div class="container about-page">

    <section id="qui-suis-je" class="profile-section">
        <h2>Qui Suis-Je ?</h2>
        <div class="profile-container">
            <div class="profile-photo">
                <img src="assets/images/photo/PICHONElisaPP.jpg" alt="Photo de profil">
            </div>
            <div class="profile-details">
                <div class="detail-box"><i data-lucide="map-pin"></i>Vannes</div>
                <div class="detail-box"><i data-lucide="message-square"></i>LV1 : Français</div>
                <div class="detail-box"><i data-lucide="graduation-cap"></i>MyDigitalSchool</div>
                <div class="detail-box"><i data-lucide="message-square"></i>LV2 : Anglais</div>
                <div class="detail-box"><i data-lucide="calendar"></i> Âge : 23 ans</div>
            </div>
        </div>
    </section>

    <section id="Atouts" class="atouts-section">
        <h2>Mes atouts</h2>
        <div class="atouts-carousel">
            <div class="atout-item"><i data-lucide="sparkles"></i><span>Créative</span></div>
            <div class="atout-item"><i data-lucide="check-circle"></i><span>Rigoureuse</span></div>
            <div class="atout-item"><i data-lucide="search"></i><span>Curieuse</span></div>
            <div class="atout-item"><i data-lucide="smile"></i><span>Positive</span></div>
            <div class="atout-item"><i data-lucide="heart-handshake"></i><span>Empathique</span></div>

            <!-- Dupliqué pour boucle fluide -->
            <div class="atout-item"><i data-lucide="sparkles"></i><span>Créative</span></div>
            <div class="atout-item"><i data-lucide="check-circle"></i><span>Rigoureuse</span></div>
            <div class="atout-item"><i data-lucide="search"></i><span>Curieuse</span></div>
            <div class="atout-item"><i data-lucide="smile"></i><span>Positive</span></div>
            <div class="atout-item"><i data-lucide="heart-handshake"></i><span>Empathique</span></div>
        </div>
    </section>

    <section id="interet">
        <h2>Centres d'intérêt</h2>
        <ul>
            <li>...</li>
            <li>...</li>
        </ul>
    </section>

    <section id="formations">
        <h2>Mes formations à venir</h2>
        <p>...</p>
    </section>

    <section id="diplome">
        <h2>Diplômes et Formations</h2>
        <p>...</p>
    </section>

    <section id="engagement">
        <h2>Mes engagements</h2>
        <p>...</p>
    </section>
</div>

<?php include $partialsPath . 'footer.php'; ?>

<!-- Activation Lucide Icons -->
<script>
    lucide.createIcons();

    // Duplique les atouts pour effet de carrousel infini fluide
    const track = document.querySelector('.atouts-carousel');
    if (track) {
        track.innerHTML += track.innerHTML;
    }
</script>
