<?php

namespace Controllers\Router\Route;

use Controllers\PersoController;

/**
 * Gère la route d'ajout ou de modification d'un personnage.
 * Délègue l'affichage et le traitement du formulaire au PersoController.
 *
 * @package Controllers\Router\Route
 */
class RouteAddPerso extends Route
{
    private PersoController $controller;

    /**
     * @param PersoController $controller Contrôleur gérant les personnages.
     */
    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Affiche le formulaire d'ajout/modification d'un personnage.
     *
     * @param array $params
     * @return void
     */
    public function get($params = [])
    {
        $this->controller->displayAddPerso();
    }

    /**
     * Traite la soumission du formulaire d'ajout/modification.
     *
     * @param array $params
     * @return void
     */
    public function post($params = [])
    {
        $this->controller->displayAddPerso($params, 'POST');
    }
}
