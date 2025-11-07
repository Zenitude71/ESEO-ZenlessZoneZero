<?php

namespace Controllers\Router;

use Controllers\MainController;
use Controllers\PersoController;
use Controllers\Router\Route\RouteIndex;
use Controllers\Router\Route\RouteAddPerso;
use Controllers\Router\Route\RouteAddElement;
use Controllers\Router\Route\RouteLogs;
use Controllers\Router\Route\RouteLogin;
use Exception;

class Router
{
    private array $routeList = [];
    private array $ctrlList = [];
    private string $action_key;

    public function __construct(string $action_key = "action")
    {
        $this->action_key = $action_key;
        $this->createControllerList();
        $this->createRouteList();
    }

    private function createControllerList(): void
    {
        $this->ctrlList = [
            'main'  => new MainController(),
            'perso' => new PersoController(),
        ];
    }

    private function createRouteList(): void
    {
        $this->routeList = [
            'index'            => new RouteIndex($this->ctrlList['main']),
            'add-perso'        => new RouteAddPerso($this->ctrlList['perso']),
            'add-perso-element'=> new RouteAddElement($this->ctrlList['perso']),
            'logs'             => new RouteLogs($this->ctrlList['main']),
            'login'            => new RouteLogin($this->ctrlList['main']),
        ];
    }

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
