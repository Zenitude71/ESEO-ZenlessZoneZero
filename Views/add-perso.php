<?php $this->layout('layout', ['title' => 'Ajouter / Modifier un personnage']); ?>

<?php if ($perso): ?>
    <h1>Modifier un personnage</h1>
<?php else: ?>
    <h1>Ajouter un personnage</h1>
<?php endif; ?>


<form method="POST" action="" class="perso-form">

    <?php if ($perso): ?>
        <input type="hidden" name="id" value="<?= $perso->getId() ?>">
    <?php endif; ?>

    <div class="perso-form-group">
        <label class="required">Nom</label>
        <input type="text" name="name" class="perso-input"
               value="<?= $perso ? htmlspecialchars($perso->getName()) : '' ?>" required>
    </div>

    <div class="perso-form-group">
        <label class="required">Élément</label>
        <select name="element" class="perso-select" required>
            <?php foreach ($elements as $el): ?>
                <option value="<?= $el['id'] ?>" <?= ($perso && $perso->getElement() == $el['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($el['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label class="required">Classe</label>
        <select name="unitclass" class="perso-select" required>
            <?php foreach ($unitclasses as $uc): ?>
                <option value="<?= $uc['id'] ?>" <?= ($perso && $perso->getUnitclass() == $uc['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($uc['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label>Origine</label>
        <select name="origin" class="perso-select">
            <option value="">-- Aucune --</option>
            <?php foreach ($origins as $org): ?>
                <option value="<?= $org['id'] ?>" <?= ($perso && $perso->getOrigin() == $org['id']) ? 'selected' : '' ?>>
                    <?= htmlspecialchars($org['name']) ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label class="required">Rareté</label>
        <select name="rarity" class="perso-select" required>
            <?php
            $rarities = [5=>'S', 4=>'A'];
            foreach ($rarities as $val => $label) {
                $selected = ($perso && $perso->getRarity() === $val) ? 'selected' : '';
                echo "<option value=\"$val\" $selected>$label</option>";
            }
            ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label>URL de l'image</label>
        <input type="text" name="url_img" class="perso-input"
               value="<?= $perso ? htmlspecialchars($perso->getUrlImg()) : '' ?>">
    </div>

    <button type="submit" class="perso-form-button">Valider</button>
</form>
