<footer>
  <div class="footer-container">
    <!-- Section Me contacter -->
    <div class="footer-section">
      <h3>Contact</h3>
      <ul>
        <li>Elisa Pichon</li>
        <li><a href="mailto:pichon.elisa29@gmail.com">pichon.elisa29@gmail.com</a></li>
        <li><a href="tel:+33699666996">06 99 66 69 96</a></li>
        <li>Webmarketing</li>
        <li><a href="https://www.linkedin.com/in/elisa-pichon-634622232/" target="_blank" rel="noopener">LinkedIn</a></li>
      </ul>
    </div>

    <!-- Section Mes projets -->
    <div class="footer-section projects">
      <h3>Mes projets</h3>
      <ul>
        <?php if (!empty($projects)): ?>
          <?php foreach ($projects as $project): ?>
            <li><a href="<?= BASE_URL ?>projet/<?= htmlspecialchars($project['slug']) ?>"><?= htmlspecialchars($project['name']) ?></a></li>
          <?php endforeach; ?>
        <?php else: ?>
          <li>Aucun projet</li>
        <?php endif; ?>
      </ul>
    </div>

    <!-- Section Légal -->
    <div class="footer-section">
      <h3>Légal</h3>
      <ul>
        <li><a href="<?= BASE_URL ?>politique-confidentialite">Politique de confidentialité</a></li>
        <li><a href="<?= BASE_URL ?>mentions-legales">Mentions légales</a></li>
        <li><a href="<?= BASE_URL ?>plan-du-site">Plan du site</a></li>
        <li><a href="<?= BASE_URL ?>contact">Contact</a></li>
      </ul>
    </div>
  </div>

  <div class="footer-bottom">
  © 2025 | Tous droits réservés —
  <a href="#" onclick="document.getElementById('cookie-banner').style.display = 'block'; return false;">
    Gérer mes cookies
  </a>
</div>

  <!-- Bandeau cookies -->
  <div id="cookie-banner" class="cookie-banner">
    <p>
  Ce site utilise des cookies pour améliorer votre expérience.
  <a href="<?= BASE_URL ?>politique-confidentialite" target="_blank" rel="noopener" style="color: #fff; text-decoration: underline;">
    En savoir plus
  </a>.
</p>

    <button id="accept-cookies">Accepter</button>
    <button id="decline-cookies">Refuser</button>
  </div>

  <script>
    lucide.createIcons();

    function setCookie(name, value, days) {
      let expires = "";
      if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days*24*60*60*1000));
        expires = "; expires=" + date.toUTCString();
      }
      document.cookie = name + "=" + (value || "")  + expires + "; path=/";
    }

    function getCookie(name) {
      let nameEQ = name + "=";
      let ca = document.cookie.split(';');
      for(let i=0;i < ca.length;i++) {
        let c = ca[i];
        while (c.charAt(0)==' ') c = c.substring(1,c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
      }
      return null;
    }

    document.addEventListener("DOMContentLoaded", function () {
      const banner = document.getElementById("cookie-banner");
      const accept = document.getElementById("accept-cookies");
      const decline = document.getElementById("decline-cookies");

      if (!getCookie("cookieConsent")) {
        banner.style.display = "block";
      }

      accept.onclick = function () {
        setCookie("cookieConsent", "true", 365);
        banner.style.display = "none";
        // Ici, tu peux activer Google Analytics si besoin
      };

      decline.onclick = function () {
        setCookie("cookieConsent", "false", 365);
        banner.style.display = "none";
      };
    });
  </script>
</footer>
