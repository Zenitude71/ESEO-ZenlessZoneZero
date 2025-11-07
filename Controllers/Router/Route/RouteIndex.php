<?php

namespace Controllers\Router\Route;

use Controllers\MainController;

class RouteIndex extends Route
{
    private MainController $controller;

    public function __construct(MainController $controller)
    {
        $this->controller = $controller;
    }

    public function get(array $params = [])
    {
        // Appelle la page d'accueil
        $this->controller->index();
    }

    public function post(array $params = [])
    {
        // Pour le moment, on redirige vers index
        $this->controller->index();
    }
}
