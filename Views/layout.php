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
            <img src="/Public/img/Zenless_Zone_Zero_logo.png" alt="Logo" class="header-icon">
            <div class="header-title">Zenless Zone Zero</div>
        </div>
    </header>

    <main>
        <?= $this->section('content') ?>
    </main>

</body>
</html>
