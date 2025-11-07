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
        $id = $params['id'] ?? null;
        if ($id) {
            $this->controller->editPerso($id);
        } else {
            header('Location: index.php?message=' . urlencode('Aucun ID fourni pour l’édition.'));
        }
    }

    public function post($params = [])
    {
        $this->get($params);
    }
}
