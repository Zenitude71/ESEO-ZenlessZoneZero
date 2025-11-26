<?php

namespace Controllers\Router\Route;

use Exception;

/**
 * Représente une route abstraite du routeur.
 * Gère automatiquement la délégation des requêtes GET et POST.
 * Fournit également une méthode utilitaire pour récupérer des paramètres en
 * validant leur présence et leur contenu.
 *
 * @package Controllers\Router\Route
 */
abstract class Route
{
    /**
     * Exécute l'action associée à la route selon la méthode HTTP fournie.
     *
     * @param array $params Paramètres passés par le routeur.
     * @param string $method Méthode HTTP utilisée (GET ou POST).
     * @return mixed
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
     * Récupère un paramètre d'un tableau en validant sa présence et son contenu.
     *
     * @param array $array Tableau dans lequel chercher.
     * @param string $paramName Nom du paramètre.
     * @param bool $canBeEmpty Autorise ou non une valeur vide.
     * @return mixed
     * @throws Exception Si le paramètre est absent ou vide.
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
     * Méthode à implémenter pour gérer une requête GET.
     *
     * @param array $params Paramètres envoyés.
     * @return mixed
     */
    abstract public function get(array $params = []);

    /**
     * Méthode à implémenter pour gérer une requête POST.
     *
     * @param array $params Paramètres envoyés.
     * @return mixed
     */
    abstract public function post(array $params = []);
}
