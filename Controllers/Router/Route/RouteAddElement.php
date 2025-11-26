<?php

namespace Controllers\Router\Route;

use Controllers\PersoController;

/**
 * Route dédiée à l'affichage et au traitement du formulaire
 * d'ajout d'un élément (Element). Délègue complètement la logique
 * au PersoController.
 *
 * @package Controllers\Router\Route
 */
class RouteAddElement extends Route
{
    private PersoController $controller;

    /**
     * @param PersoController $controller Controller gérant l'ajout des éléments.
     */
    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    /**
     * Affiche le formulaire d'ajout d'un élément.
     *
     * @param array $params
     * @return void
     */
    public function get($params = [])
    {
        $this->controller->displayAddElement();
    }

    /**
     * Traite la soumission du formulaire d'ajout d'un élément.
     *
     * @param array $params
     * @return void
     */
    public function post($params = [])
    {
        $this->controller->displayAddElement();
    }
}
