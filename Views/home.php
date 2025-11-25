<?php $this->layout('layout', ['title' => $gameName]) ?>

<h1 class="title">Liste des personnages</h1>

<?php if (!empty($listPersonnage)): ?>
    <div class="personnage-grid">
        <?php foreach ($listPersonnage as $perso): ?>

            <?php
            // Récupération de la couleur hex de l’élément
            $elementColor = $perso->getElementColor();

            // Rareté → Rank
            $rarityMap = [5 => 'S', 4 => 'A'];
            $rank = $rarityMap[$perso->getRarity()] ?? $perso->getRarity();
            ?>

            <div class="personnage-card" style="background-color: <?= htmlspecialchars($elementColor) ?>;">

                <div class="personnage-img-wrapper">
                    <img src="<?= htmlspecialchars($perso->getUrlImg()) ?>"
                         alt="<?= htmlspecialchars($perso->getName()) ?>"
                         class="personnage-img">
                </div>

                <div class="personnage-name">
                    <?= htmlspecialchars($perso->getName()) ?>
                </div>

                <div class="personnage-rank">(<?= $rank ?>)</div>

                <div class="personnage-actions">
                    <a href="index.php?action=edit-perso&id=<?= urlencode($perso->getId()) ?>" class="btn-edit">✏️</a>
                    <a href="index.php?action=del-perso&id=<?= urlencode($perso->getId()) ?>" class="btn-delete">🗑️</a>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
