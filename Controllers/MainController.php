<?php

namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

class MainController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine('Views');
    }

    public function index(): void
    {
        echo $this->templates->render('home', [
            'gameName' => 'Zenless Zone Zero'
        ]);

        $dao = new PersonnageDAO();

        $listPersonnage = $dao->getAll();
        $first = $dao->getByID('5f8b9a1c2d3e4');
        $other = $dao->getByID('5f8b9a1c2d3e4');

        $this->render('home', [
            'listPersonnage' => $listPersonnage,
            'first' => $first,
            'other' => $other
        ]);
    }
}
