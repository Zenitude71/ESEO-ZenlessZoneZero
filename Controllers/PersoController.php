<?php

namespace Controllers;

use League\Plates\Engine;
use Models\ElementDAO;
use Models\OriginDAO;
use Models\PersonnageDAO;
use Models\UnitclassDAO;

class PersoController
{
    private Engine $templates;
    private PersonnageDAO $persoDAO;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
        $this->persoDAO = new PersonnageDAO(); // TU UTILISES LE DAO DIRECTEMENT
    }

    public function displayAddPerso(array $params = [], string $method = 'GET'): void
    {
        $elementDAO = new ElementDAO();
        $unitclassDAO = new UnitclassDAO();
        $originDAO = new OriginDAO();

        $elements = $elementDAO->getAll();
        $unitclasses = $unitclassDAO->getAll();
        $origins = $originDAO->getAll();

        // Charger le perso si modification
        $perso = null;
        if (!empty($params['id'])) {
            $perso = $this->persoDAO->getByID((int)$params['id']);
        }

        // --- POST ---
        if ($method === 'POST') {
            $id        = $params['id'] ?? null;
            $name      = $params['name'];
            $element   = $params['element'];
            $unitclass = $params['unitclass'];
            $origin    = $params['origin'] ?: null;
            $rarity    = (int)$params['rarity'];
            $url_img   = $params['url_img'];

            if ($id) {
                $this->persoDAO->update($id, $name, $element, $unitclass, $origin, $rarity, $url_img);
            } else {
                $this->persoDAO->add($name, $element, $unitclass, $origin, $rarity, $url_img);
            }

            header("Location: index.php?action=index");
            exit;
        }

        // --- RENDU ---
        echo $this->templates->render('add-perso', [
            'perso'       => $perso,
            'elements'    => $elements,
            'unitclasses' => $unitclasses,
            'origins'     => $origins
        ]);
    }

    public function editPerso($id)
    {
        header("Location: index.php?action=add-perso&id=" . urlencode($id));
        exit;
    }

    public function deletePerso($id)
    {
        $this->persoDAO->delete($id);

        header("Location: index.php?message=" . urlencode("Personnage supprimé avec succès !"));
        exit;
    }
}
