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
        $id = $this->getParam($params, 'id');
        $this->controller->editPerso($id);
    }

    public function post($params = [])
    {
        $this->controller->displayAddPerso();
    }
}
