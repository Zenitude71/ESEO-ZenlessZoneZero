<?php

namespace Controllers\Router\Route;

use Controllers\PersoController;

class RouteAddPerso extends Route
{
    private PersoController $controller;

    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displayAddPerso();
    }

    public function post($params = [])
    {
        $this->controller->displayAddPerso();
    }
}
