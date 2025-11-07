<?php

namespace Controllers\Router\Route;

use Exception;

abstract class Route
{
    /**
     * Méthode principale pour appeler la route
     * @param array $params paramètres GET ou POST
     * @param string $method méthode HTTP ("GET" ou "POST")
     */
    public function action(array $params = [], string $method = 'GET')
    {
        if ($method === 'POST') {
            return $this->post($params);
        } else {
            return $this->get($params);
        }
    }

    /**
     * Récupère un paramètre en vérifiant sa validité
     */
    protected function getParam(array $array, string $paramName, bool $canBeEmpty = true)
    {
        if (isset($array[$paramName])) {
            if (!$canBeEmpty && empty($array[$paramName])) {
                throw new Exception("Paramètre '$paramName' vide");
            }
            return $array[$paramName];
        } else {
            throw new Exception("Paramètre '$paramName' absent");
        }
    }

    /**
     * Méthode GET (obligatoire à définir dans les classes filles)
     */
    abstract public function get(array $params = []);

    /**
     * Méthode POST (obligatoire à définir dans les classes filles)
     */
    abstract public function post(array $params = []);
}
