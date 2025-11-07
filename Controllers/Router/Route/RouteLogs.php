<?php

namespace Controllers\Router\Route;

use Controllers\MainController;

class RouteLogs extends Route
{
    private MainController $controller;

    public function __construct(MainController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        echo $this->controller->displayLogs();
    }

    public function post($params = [])
    {
        echo $this->controller->displayLogs();
    }
}
