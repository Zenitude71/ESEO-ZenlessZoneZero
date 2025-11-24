<?php

namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

class MainController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function index(): void
    {
        $dao = new PersonnageDAO();

        $listPersonnage = $dao->getAll();
        $first = $dao->getByID('5f8b9a1c2d3e4');
        $other = $dao->getByID('5f8b9a1c2d3e4');

        // On passe tout à la vue 'home'
        echo $this->templates->render('home', [
            'gameName' => 'Zenless Zone Zero',
            'listPersonnage' => $listPersonnage,
            'first' => $first,
            'other' => $other
        ]);
    }

    public function displayLogs() { echo $this->templates->render('logs'); }
    public function displayLogin() { echo $this->templates->render('login'); }

}
