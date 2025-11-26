<?php

namespace Controllers\Router;

use Controllers\AttributController;
use Controllers\MainController;
use Controllers\PersoController;
use Controllers\Router\Route\RouteAddAttribut;
use Controllers\Router\Route\RouteDeletePerso;
use Controllers\Router\Route\RouteEditPerso;
use Controllers\Router\Route\RouteIndex;
use Controllers\Router\Route\RouteAddPerso;
use Controllers\Router\Route\RouteAddElement;
use Exception;

/**
 * Gère la correspondance entre les actions de l’utilisateur et les routes de l’application.
 * Initialise les contrôleurs et les routes disponibles, puis délègue l’exécution à la route correspondante.
 *
 * @package Controllers\Router
 */
class Router
{
    private array $routeList = [];
    private array $ctrlList = [];
    private string $action_key;

    /**
     * @param string $action_key Clé GET pour récupérer l’action (par défaut 'action').
     */
    public function __construct(string $action_key = "action")
    {
        $this->action_key = $action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    /**
     * Initialise les contrôleurs utilisés par les routes.
     */
    private function createControllerList(): void
    {
        $this->ctrlList = [
            'main'     => new MainController(),
            'perso'    => new PersoController(),
            'attribut' => new AttributController()
        ];
    }

    /**
     * Initialise les routes disponibles dans l’application.
     */
    private function createRouteList(): void
    {
        $this->routeList = [
            'index'             => new RouteIndex($this->ctrlList['main']),
            'add-perso'         => new RouteAddPerso($this->ctrlList['perso']),
            'add-perso-element' => new RouteAddElement($this->ctrlList['perso']),
            'edit-perso'        => new RouteEditPerso($this->ctrlList['perso']),
            'del-perso'         => new RouteDeletePerso($this->ctrlList['perso']),
            'add-attribut'      => new RouteAddAttribut($this->ctrlList['attribut']),
        ];
    }

    /**
     * Route l’action demandée vers la route correspondante.
     *
     * @param array $get Tableau $_GET
     * @param array $post Tableau $_POST
     * @throws Exception Si la route n’existe pas.
     */
    public function routing(array $get, array $post): void
    {
        $action = $get[$this->action_key] ?? 'index';

        if (!isset($this->routeList[$action])) {
            throw new Exception("Route inconnue : $action");
        }

        $route = $this->routeList[$action];
        $method = ($_SERVER['REQUEST_METHOD'] === 'POST') ? 'POST' : 'GET';
        $params = ($method === 'POST') ? $post : $get;

        $route->action($params, $method);
    }
}
