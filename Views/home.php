<?php $this->layout('layout', ['title' => $gameName]) ?>

<h1 class="title">Liste des personnages</h1>

<?php if (!empty($listPersonnage)): ?>
    <div class="personnage-grid">
        <?php foreach ($listPersonnage as $perso): ?>
            <div class="personnage-card">
                <img src="<?= htmlspecialchars($perso->getUrlImg()) ?>"
                     alt="<?= htmlspecialchars($perso->getName()) ?>"
                     class="personnage-img">

                <h2><?= htmlspecialchars($perso->getName()) ?></h2>

                <ul>
                    <li><strong>Élément :</strong> <?= htmlspecialchars($perso->getElement()) ?></li>
                    <li><strong>Classe :</strong> <?= htmlspecialchars($perso->getUnitclass()) ?></li>
                    <li><strong>Rareté :</strong> <?= htmlspecialchars($perso->getRarity()) ?>★</li>
                    <?php if ($perso->getOrigin()): ?>
                        <li><strong>Origine :</strong> <?= htmlspecialchars($perso->getOrigin()) ?></li>
                    <?php endif; ?>
                </ul>
            </div>
        <?php endforeach; ?>
    </div>
<?php else: ?>
    <p>Aucun personnage trouvé.</p>
<?php endif; ?>
