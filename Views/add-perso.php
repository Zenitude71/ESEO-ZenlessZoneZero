<?php $this->layout('layout', ['title' => 'Ajouter un personnage']); ?>

<h1>Ajouter / Modifier un personnage</h1>

<form method="POST" action="" class="perso-form">

    <div class="perso-form-group">
        <label class="required">Nom</label>
        <input type="text" name="name" class="perso-input"
               value="<?= $perso ? htmlspecialchars($perso->getName()) : '' ?>" required>
    </div>

    <div class="perso-form-group">
        <label class="required">Élément</label>
        <select name="element" class="perso-select" required>
            <?php
            $elements = ['Electric','Ether','Fire','Ice','Physical','Wind','Other'];
            foreach ($elements as $el) {
                $selected = ($perso && $perso->getElement() === $el) ? 'selected' : '';
                echo "<option value=\"$el\" $selected>$el</option>";
            }
            ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label class="required">Classe</label>
        <input type="text" name="unitclass" class="perso-input"
               value="<?= $perso ? htmlspecialchars($perso->getUnitclass()) : '' ?>" required>
    </div>

    <div class="perso-form-group">
        <label>Origine</label>
        <input type="text" name="origin" class="perso-input"
               value="<?= $perso ? htmlspecialchars($perso->getOrigin()) : '' ?>">
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
