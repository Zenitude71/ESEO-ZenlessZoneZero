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
        // Vérifie si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $name      = $_POST['name'] ?? '';
            $element   = $_POST['element'] ?? '';
            $unitclass = $_POST['unitclass'] ?? '';
            $origin    = $_POST['origin'] ?? '';
            $rarity    = $_POST['rarity'] ?? '';
            $url_img   = $_POST['url_img'] ?? '';

            $dao = new \Models\PersonnageDAO();

            // <-- Ici on place ce code
            if (!empty($_GET['id'])) {
                // update existant
                $dao->update($_GET['id'], $name, $element, $unitclass, $origin, $rarity, $url_img);
            } else {
                // ajout
                $dao->add($name, $element, $unitclass, $origin, $rarity, $url_img);
            }

            // Redirection vers l'accueil après insertion / update
            header("Location: index.php");
            exit;
        }

        $perso = null;
        if (!empty($_GET['id'])) {
            $perso = (new \Models\PersonnageDAO())->getByID($_GET['id']);
        }

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
