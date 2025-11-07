<?php $this->layout('layout')?>

<form class="perso-form" method="post" action="index.php?action=add-perso<?= isset($perso) ? '&id=' . urlencode($perso->getId()) : '' ?>" enctype="multipart/form-data">

    <h1><?= isset($perso) ? 'Modifier Personnage' : 'Ajouter Personnage' ?></h1>

    <div class="perso-form-group">
        <label for="name">Nom :</label>
        <input type="text" id="name" name="name" value="<?= isset($perso) ? htmlspecialchars($perso->getName()) : '' ?>" required>
    </div>

    <div class="perso-form-group">
        <label for="element">Élément :</label>
        <select id="element" name="element" required>
            <?php
            $elements = ['Electric','Ether','Fire','Ice','Physical','Wind','Other'];
            foreach ($elements as $elem):
                $selected = (isset($perso) && $perso->getElement() === $elem) ? 'selected' : '';
                ?>
                <option value="<?= $elem ?>" <?= $selected ?>><?= $elem ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label for="unitclass">Classe :</label>
        <input type="text" id="unitclass" name="unitclass" value="<?= isset($perso) ? htmlspecialchars($perso->getUnitclass()) : '' ?>" required>
    </div>

    <div class="perso-form-group">
        <label for="origin">Origine :</label>
        <input type="text" id="origin" name="origin" value="<?= isset($perso) ? htmlspecialchars($perso->getOrigin()) : '' ?>">
    </div>

    <div class="perso-form-group">
        <label for="rarity">Rareté :</label>
        <select id="rarity" name="rarity" required>
            <?php
            $rarities = [5,4];
            foreach ($rarities as $r):
                $selected = (isset($perso) && $perso->getRarity() == $r) ? 'selected' : '';
                ?>
                <option value="<?= $r ?>" <?= $selected ?>><?= $r ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="perso-form-group">
        <label for="url_img">URL Image :</label>
        <input type="text" id="url_img" name="url_img" value="<?= isset($perso) ? htmlspecialchars($perso->getUrlImg()) : '' ?>">
    </div>

    <button type="submit" class="perso-form-button"><?= isset($perso) ? 'Modifier' : 'Ajouter' ?></button>
</form>
