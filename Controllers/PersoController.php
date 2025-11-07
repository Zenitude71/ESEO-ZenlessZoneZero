<?php

namespace Controllers;

use League\Plates\Engine;

class PersoController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    // Dans PersoController.php
    public function displayAddPerso(): void
    {
        // Vérifie que le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name      = $_POST['name'] ?? '';
            $element   = $_POST['element'] ?? '';
            $unitclass = $_POST['unitclass'] ?? '';
            $origin    = $_POST['origin'] ?? '';
            $rarity    = $_POST['rarity'] ?? '';
            $url_img   = $_POST['url_img'] ?? '';

            // Ici tu pourrais utiliser un DAO pour insérer en base
            $dao = new \Models\PersonnageDAO();

            if (!empty($_GET['id'])) {
                // update existant
                $dao->update($_GET['id'], $name, $element, $unitclass, $origin, $rarity, $url_img);
            } else {
                // ajout
                $dao->add($name, $element, $unitclass, $origin, $rarity, $url_img);
            }

            // Redirection vers la page d'accueil
            header("Location: index.php");
            exit;
        }

        // Sinon affichage du formulaire
        $perso = !empty($_GET['id']) ? (new \Models\PersonnageDAO())->getByID($_GET['id']) : null;
        echo $this->templates->render('add-perso', ['perso' => $perso]);
    }

    public function editPerso($id)
    {
        header("Location: index.php?action=add-perso&id=" . urlencode($id));
        exit;
    }

    public function deletePerso($id)
    {
        header("Location: index.php?message=" . urlencode("Personnage supprimé avec succès !"));
        exit;
    }
}
