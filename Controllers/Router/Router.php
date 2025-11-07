<?php

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\Router\Route\RouteIndex;
use Controllers\Router\Route\Route;
use Exception;

class Router
{
    private array $routeList = [];
    private array $ctrlList = [];
    private string $actionKey;

    public function __construct(string $nameOfActionKey = 'action')
    {
        $this->actionKey = $nameOfActionKey;
        $this->createControllerList();
        $this->createRouteList();
    }

    /**
     * Crée la liste des contrôleurs
     */
    private function createControllerList(): void
    {
        $this->ctrlList['main'] = new MainController();
    }

    /**
     * Crée la liste des routes
     */
    private function createRouteList(): void
    {
        $this->routeList['index'] = new RouteIndex($this->ctrlList['main']);
    }

    /**
     * Méthode principale du routeur : choisit et appelle la bonne route
     */
    public function routing(array $get, array $post): void
    {
        $action = $get[$this->actionKey] ?? 'index'; // action par défaut

        if (!isset($this->routeList[$action])) {
            throw new Exception("Route inconnue : '$action'");
        }

        $route = $this->routeList[$action];
        $method = $_SERVER['REQUEST_METHOD'] ?? 'GET';

        if (!($route instanceof Route)) {
            throw new Exception("La route '$action' n'est pas valide");
        }

        if ($method === 'POST') {
            $route->action($post, 'POST');
        } else {
            $route->action($get, 'GET');
        }
    }
}
