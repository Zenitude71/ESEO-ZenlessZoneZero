<?php
namespace Controllers\Router\Route;

use Controllers\PersoController;

class RouteDeletePerso extends Route
{
    private PersoController $controller;

    public function __construct(PersoController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        $id = $params['id'] ?? null;
        if ($id) {
            $this->controller->deletePerso($id);
        }
    }

    public function post($params = [])
    {
        $this->get($params);
    }
}
