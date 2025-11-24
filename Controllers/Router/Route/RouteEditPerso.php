<?php
namespace Controllers\Router\Route;

use Controllers\PersoController;

class RouteEditPerso extends Route
{
    private PersoController $controller;

    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $this->controller->displayAddPerso($params, 'GET');
    }

    public function post($params = [])
    {
        $this->controller->displayAddPerso($params, 'POST');
    }
}
