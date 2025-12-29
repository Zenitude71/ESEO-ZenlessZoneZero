<?php

namespace Controllers;

use Helpers\Logger;
use League\Plates\Engine;
use Models\ElementDAO;
use Models\OriginDAO;
use Models\PersonnageDAO;
use Models\UnitclassDAO;

/**
 * Class PersoController
 *
 * Contrôleur gérant les actions liées aux personnages.
 * Permet d'ajouter, modifier et supprimer des personnages.
 *
 * @package Controllers
 */
class PersoController
{
    private Engine $templates;
    private PersonnageDAO $persoDAO;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
        $this->persoDAO = new PersonnageDAO();
    }

    /**
     * Affiche le formulaire d'ajout ou de modification d'un personnage.
     * Traite également la soumission du formulaire.
     */
    public function displayAddPerso(array $params = [], string $method = 'GET'): void
    {
        $elementDAO = new ElementDAO();
        $unitclassDAO = new UnitclassDAO();
        $originDAO = new OriginDAO();

        $elements = $elementDAO->getAll();
        $unitclasses = $unitclassDAO->getAll();
        $origins = $originDAO->getAll();

        $perso = null;
        if (!empty($params['id'])) {
            $perso = $this->persoDAO->getByID((int)$params['id']);
        }

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
                Logger::log('MODIFICATION', "Mise à jour du personnage ID $id : $name");
            } else {
                $this->persoDAO->add($name, $element, $unitclass, $origin, $rarity, $url_img);
                Logger::log('CREATION', "Ajout du nouveau personnage : $name");
            }

            header("Location: index.php?action=index");
            exit;
        }

        echo $this->templates->render('add-perso', [
            'perso'       => $perso,
            'elements'    => $elements,
            'unitclasses' => $unitclasses,
            'origins'     => $origins
        ]);
    }

    /**
     * Supprime un personnage en fonction de son identifiant.
     */
    public function deletePerso($id)
    {
        $this->persoDAO->delete($id);

        header("Location: index.php?message=" . urlencode("Personnage supprimé avec succès !"));

        Logger::log('SUPPRESSION', "Personnage supprimé : $name (ID: $id)");

        exit;
    }
}
