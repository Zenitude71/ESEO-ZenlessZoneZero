<?php
namespace Controllers\Router\Route;

use Controllers\PersoController;

/**
 * Gère la suppression d’un personnage via son identifiant.
 * La logique est entièrement déléguée au PersoController.
 *
 * @package Controllers\Router\Route
 */
class RouteDeletePerso extends Route
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
     * Supprime un personnage si un ID est fourni.
     *
     * @param array $params
     * @return void
     */
    public function get($params = [])
    {
        $id = $params['id'] ?? null;
        if ($id) {
            $this->controller->deletePerso($id);
        }
    }

    /**
     * Comporte comme GET : supprime selon l'ID fourni.
     *
     * @param array $params
     * @return void
     */
    public function post($params = [])
    {
        $this->get($params);
    }
}
