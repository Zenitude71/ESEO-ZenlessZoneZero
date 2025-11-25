<?php


namespace Controllers\Router\Route;

use Controllers\AttributController;

class RouteAddAttribut extends Route
{
    private AttributController $ctrl;

    public function __construct(AttributController $ctrl)
    {
        $this->ctrl = $ctrl;
    }

    public function get($params = []): void
    {
        $this->ctrl->displayAddAttribut($params, 'GET');
    }

    public function post($params = []): void
    {
        $this->ctrl->displayAddAttribut($params, 'POST');
    }
}
