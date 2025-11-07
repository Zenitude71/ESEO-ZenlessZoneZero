<?php

namespace Controllers;

use League\Plates\Engine;

class ElementController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function displayAddElement()
    {
        echo $this->templates->render('add-perso-element');
    }
}
