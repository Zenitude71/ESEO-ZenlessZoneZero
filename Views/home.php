<?php $this->layout('layout', ['title' => $gameName]) ?>

<h1 class="title">Liste des personnages</h1>

<?php if (!empty($listPersonnage)): ?>
    <div class="personnage-grid">
        <?php foreach ($listPersonnage as $perso): ?>

            <?php
            // mapping des éléments en classes CSS
            $elementClassMap = [
                    'Electric' => 'attribute-electric',
                    'Ether' => 'attribute-ether',
                    'Fire' => 'attribute-fire',
                    'Ice' => 'attribute-ice',
                    'Physical' => 'attribute-physical',
                    'Wind' => 'attribute-wind',
                    'Other' => 'attribute-other',
                    'Fairy' => 'attribute-fairy',
                    'Hacked' => 'attribute-hacked',
            ];

            $elementClass = $elementClassMap[$perso->getElement()] ?? '';

            // mapping rareté
            $rarityMap = [5 => 'S', 4 => 'A'];
            $rank = $rarityMap[$perso->getRarity()] ?? $perso->getRarity();
            ?>

            <div class="personnage-card">

                <!-- Image carrée -->
                <div class="personnage-img-wrapper">
                    <img src="<?= htmlspecialchars($perso->getUrlImg()) ?>"
                         alt="<?= htmlspecialchars($perso->getName()) ?>"
                         class="personnage-img">
                </div>

                <!-- Nom + Rank avec couleur selon élément -->
                <h2 class="personnage-name <?= $elementClass ?>">
                    <?= htmlspecialchars($perso->getName()) ?> (<?= $rank ?>)
                </h2>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
