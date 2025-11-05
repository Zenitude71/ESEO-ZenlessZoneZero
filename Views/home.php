<?php $this->layout('layout', ['title' => $gameName]) ?>

<h1 class="title">Liste des personnages</h1>

<?php if (!empty($listPersonnage)): ?>
    <div class="personnage-grid">
        <?php foreach ($listPersonnage as $perso): ?>
            <div class="personnage-card">

                <!-- Image carrée -->
                <div class="personnage-img-wrapper">
                    <img src="<?= htmlspecialchars($perso->getUrlImg()) ?>"
                         alt="<?= htmlspecialchars($perso->getName()) ?>"
                         class="personnage-img">
                </div>

                <!-- Nom -->
                <h2 class="personnage-name"><?= htmlspecialchars($perso->getName()) ?></h2>

                <!-- Rareté -->
                <p class="personnage-rarity">
                    <?php
                    $rarityMap = [5 => 'S', 4 => 'A'];
                    echo $rarityMap[$perso->getRarity()] ?? $perso->getRarity();
                    ?>
                </p>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
