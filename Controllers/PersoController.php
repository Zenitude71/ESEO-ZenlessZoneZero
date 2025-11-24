<?php

namespace Controllers;

use League\Plates\Engine;
use Models\PersonnageDAO;

class PersoController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function displayAddPerso(array $params = [], string $method = 'GET'): void
    {
        var_dump($params);
        $dao = new PersonnageDAO();
        
        if ($method === 'POST') {
            $id        = $params['id'] ?? null;
            $name      = $params['name'] ?? '';
            $element   = $params['element'] ?? '';
            $unitclass = $params['unitclass'] ?? '';
            $origin    = $params['origin'] ?? '';
            $rarity    = $params['rarity'] ?? '';
            $url_img   = $params['url_img'] ?? '';

            if (!empty($id)) {
                $dao->update($id, $name, $element, $unitclass, $origin, $rarity, $url_img);
            } else {
                $dao->add($name, $element, $unitclass, $origin, $rarity, $url_img);
            }

            header("Location: index.php?action=index");
            exit;
        }

        $perso = null;
        if (!empty($params['id'])) {
            $perso = $dao->getByID($params['id']);
        }

        echo $this->templates->render('add-perso', [
            'perso' => $perso
        ]);
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
