<?php

namespace Controllers;

use League\Plates\Engine;

class PersoController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function displayAddPerso()
    {
        echo $this->templates->render('add-perso');
    }

    public function editPerso($id)
    {
        header("Location: index.php?action=add-perso&id=" . urlencode($id));
        exit;
    }

    public function deletePerso($id)
    {
        header("Location: index.php?message=" . urlencode("Personnage supprimé avec succès !"));
        exit;
    }
}
