<?php

namespace Controllers\Router\Route;

use Controllers\MainController;

/**
 * Class RouteIndex
 * Route principale de l’application.
 * Affiche la page d’accueil via le MainController.
 *
 * @package Controllers\Router\Route
 */
class RouteIndex extends Route
{
    private MainController $controller;

    /**
     * @param MainController $controller Contrôleur principal de l’application.
     */
    public function __construct(MainController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Affiche la page d’accueil.
     *
     * @param array $params
     * @return void
     */
    public function get(array $params = [])
    {
        $this->controller->index();
    }

    /**
     * Affiche également la page d’accueil pour une requête POST.
     *
     * @param array $params
     * @return void
     */
    public function post(array $params = [])
    {
        $this->controller->index();
    }
}
