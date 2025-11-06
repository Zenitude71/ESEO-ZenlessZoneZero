<!-- Views/layout.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="icon" type="image/png" href="/public/images/Zenless_Zone_Zero_logo.png">
    <link rel="stylesheet" href="/public/css/main.css">
</head>
<body>
<header class="main-header">
    <div class="header-content">
        <div class="header-left">
            <img src="/Public/img/Zenless_Zone_Zero_logo.png" alt="Logo" class="header-icon">
            <div class="header-title">Zenless Zone Zero</div>
        </div>

        <nav class="main-nav">
            <ul>
                <li><a href="index.php">Accueil</a></li>
                <li><a href="index.php?action=add-perso">Ajouter un perso</a></li>
                <li><a href="index.php?action=add-perso-element">Ajouter un élément</a></li>
                <li><a href="index.php?action=logs">Logs</a></li>
                <li><a href="index.php?action=login">Login</a></li>
            </ul>
        </nav>
    </div>
</header>

<main class="content">
    <?= $this->section('content') ?>
</main>
</body>
</html>
