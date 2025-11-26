<?php
namespace Controllers\Router\Route;

use Controllers\PersoController;

/**
 * Route dédiée à l’édition d’un personnage.
 * Appelle le formulaire d’ajout/modification avec les données d’un personnage existant.
 *
 * @package Controllers\Router\Route
 */
class RouteEditPerso extends Route
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
     * Affiche le formulaire pré-rempli pour un personnage à modifier.
     *
     * @param array $params
     * @return void
     */
    public function get($params = [])
    {
        $this->controller->displayAddPerso($params, 'GET');
    }

    /**
     * Enregistre la mise à jour d’un personnage.
     *
     * @param array $params
     * @return void
     */
    public function post($params = [])
    {
        $this->controller->displayAddPerso($params, 'POST');
    }
}
