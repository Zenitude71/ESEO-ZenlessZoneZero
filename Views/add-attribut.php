<?php
$this->layout('layout', ['title' => 'Ajouter un attribut']); ?>

<h1>Ajouter un attribut</h1>

<form method="POST" action="" class="attribut-form">
    <div class="form-group">
        <label class="required">Type d'attribut</label>
        <select name="type" class="form-select" required>
            <option value="">-- Sélectionnez --</option>
            <option value="element">Element</option>
            <option value="origin">Origine</option>
            <option value="unitclass">Classe</option>
        </select>
    </div>

    <div class="form-group">
        <label class="required">Nom</label>
        <input type="text" name="name" class="form-input" required>
    </div>

    <div class="form-group" id="color-group" style="display:none;">
        <label class="required">Couleur HEX (ex: #FF0000)</label>
        <input type="text" name="color" class="form-input">
    </div>

    <div class="form-group">
        <label class="required">URL de l'image</label>
        <input type="text" name="url_img" class="form-input" required>
    </div>

    <button type="submit" class="form-button">Ajouter</button>
</form>

<script>
    const typeSelect = document.querySelector('select[name="type"]');
    const colorGroup = document.getElementById('color-group');

    typeSelect.addEventListener('change', () => {
        if (typeSelect.value === 'element') {
            colorGroup.style.display = 'block';
        } else {
            colorGroup.style.display = 'none';
        }
    });
</script>
