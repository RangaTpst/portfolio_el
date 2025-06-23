<?php require_once __DIR__ . '/../../../config/config.php'; ?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion Admin</title>
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/login.css">
</head>
<body>

    <div class="login-container">
        <h1>Connexion Admin</h1>

        <?php if (isset($_GET['error'])): ?>
            <p class="error">Identifiants incorrects.</p>
        <?php endif; ?>

        <form action="<?= BASE_URL ?>process-login-4e7b20d" method="POST">
            <input type="text" name="username" placeholder="Nom d'utilisateur" required>
            <input type="password" name="password" placeholder="Mot de passe" required>
            <button type="submit">Se connecter</button>
        </form>
    </div>

</body>
</html>
