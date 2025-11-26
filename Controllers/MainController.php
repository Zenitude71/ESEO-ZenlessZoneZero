<?php

namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

/**
 * Contrôleur principal de l'application.
 * Gère l'affichage de la page d'accueil, des logs et du formulaire de connexion.
 *
 * @package Controllers
 */
class MainController
{
    private Engine $templates;

    /**
     * Initialise le moteur de templates Plates.
     */
    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    /**
     * Affiche la page d'accueil avec la liste des personnages.
     */
    public function index(): void
    {
        $dao = new PersonnageDAO();

        $listPersonnage = $dao->getAll();
        $first = $dao->getByID('5f8b9a1c2d3e4');
        $other = $dao->getByID('5f8b9a1c2d3e4');

        echo $this->templates->render('home', [
            'gameName' => 'Zenless Zone Zero',
            'listPersonnage' => $listPersonnage,
            'first' => $first,
            'other' => $other
        ]);
    }

    /**
     * Affiche la page des logs.
     */
    public function displayLogs(): void
    {
        echo $this->templates->render('logs');
    }

    /**
     * Affiche le formulaire de connexion.
     */
    public function displayLogin(): void
    {
        echo $this->templates->render('login');
    }
}
