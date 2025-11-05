<?php $this->layout('layout', ['title' => $gameName]) ?>

<h1 class="title">Liste des personnages</h1>

<?php if (!empty($listPersonnage)): ?>
    <div class="personnage-grid">
        <?php foreach ($listPersonnage as $perso): ?>

            <?php
            // Mapping des éléments en classes CSS pour le background
            $elementClassMap = [
                    'Electric' => 'bg-electric',
                    'Ether' => 'bg-ether',
                    'Fire' => 'bg-fire',
                    'Ice' => 'bg-ice',
                    'Physical' => 'bg-physical',
                    'Wind' => 'bg-wind',
                    'Other' => 'bg-other',
                    'Fairy' => 'bg-fairy',
                    'Hacked' => 'bg-hacked',
            ];
            $elementClass = $elementClassMap[$perso->getElement()] ?? '';

            // Mapping rareté
            $rarityMap = [5 => 'S', 4 => 'A'];
            $rank = $rarityMap[$perso->getRarity()] ?? $perso->getRarity();
            ?>

            <div class="personnage-card <?= $elementClass ?>">

                <!-- Image carrée -->
                <div class="personnage-img-wrapper">
                    <img src="<?= htmlspecialchars($perso->getUrlImg()) ?>"
                         alt="<?= htmlspecialchars($perso->getName()) ?>"
                         class="personnage-img">
                </div>

                <!-- Nom + Rank -->
                <div class="personnage-name">
                    <?= htmlspecialchars($perso->getName()) ?>
                </div>
                <div class="personnage-rank">(<?= $rank ?>)</div>

            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
