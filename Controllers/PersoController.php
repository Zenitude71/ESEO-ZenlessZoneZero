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

    // Page d’ajout de personnage
    public function displayAddPerso(): void
    {
        echo $this->templates->render('add-perso');
    }

    // Page d’ajout d’un élément
    public function displayAddElement(): void
    {
        echo $this->templates->render('add-element');
    }
}
