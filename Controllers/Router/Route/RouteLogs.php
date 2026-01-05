<?php

namespace Controllers\Router\Route;

use Controllers\LogController;

class RouteLogs extends Route
{
    private LogController $controller;

    public function __construct(LogController $controller)
    {
        $this->controller = $controller;
    }

    public function get($params = [])
    {
        if (isset($params['file'])) {
            $this->controller->download($params['file']);
        } else {
            $this->controller->index();
        }
    }

    public function post($params = [])
    {
        $this->get($params);
    }
}