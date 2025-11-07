<?php

namespace Controllers\Router\Route;

use Controllers\PersoController;

class RouteAddElement extends Route
{
    private PersoController $controller;

    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displayAddElement();
    }

    public function post($params = [])
    {
        $this->controller->displayAddElement();
    }
}
