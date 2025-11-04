<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= $this->e($title) ?></title>
    <link rel="stylesheet" href="public/css/main.css"/>
</head>
<body>
<header>
    <nav>
        <!-- Ton menu -->
    </nav>
</header>

<main id="contenu">
    <?= $this->section('content') ?>
</main>

<footer>
    <p>© <?= date('Y') ?> - Zenless Zone Zero by Zenitude</p>
</footer>
</body>
</html>
