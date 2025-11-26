<?php

namespace Controllers\Router\Route;

use Controllers\AttributController;

/**
 * Gère la route permettant d'afficher ou de traiter le formulaire
 * d'ajout d'un attribut (Element, Origin, UnitClass).
 * Déconnecte la logique GET/POST en déléguant entièrement au controller
 * AttributController.
 *
 * @package Controllers\Router\Route
 */
class RouteAddAttribut extends Route
{
    private AttributController $ctrl;

    /**
     * @param AttributController $ctrl Controller chargé du traitement des attributs.
     */
    public function __construct(AttributController $ctrl)
    {
        $this->ctrl = $ctrl;
    }

    /**
     * Gère la requête GET en affichant le formulaire d'ajout.
     *
     * @param array $params
     * @return void
     */
    public function get($params = []): void
    {
        $this->ctrl->displayAddAttribut($params, 'GET');
    }

    /**
     * Gère la requête POST en traitant l'enregistrement de l'attribut.
     *
     * @param array $params
     * @return void
     */
    public function post($params = []): void
    {
        $this->ctrl->displayAddAttribut($params, 'POST');
    }
}
