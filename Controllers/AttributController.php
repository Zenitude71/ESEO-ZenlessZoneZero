<?php


namespace Controllers;

use League\Plates\Engine;
use Models\ElementDAO;
use Models\OriginDAO;
use Models\UnitclassDAO;

class AttributController
{
    private Engine $templates;

    public function __construct()
    {
        $this->templates = new Engine(__DIR__ . '/../Views');
    }

    public function displayAddAttribut(array $params = [], string $method = 'GET'): void
    {
        if ($method === 'POST') {
            $type = $params['type'] ?? '';
            $name = $params['name'] ?? '';
            $url_img = $params['url_img'] ?? '';
            $color = $params['color'] ?? null;

            switch ($type) {
                case 'element':
                    if (!$color) {
                        die("L'élément nécessite une couleur HEX.");
                    }
                    $dao = new ElementDAO();
                    $dao->add($name, $color, $url_img);
                    break;

                case 'origin':
                    $dao = new OriginDAO();
                    $dao->add($name, $url_img);
                    break;

                case 'unitclass':
                    $dao = new UnitclassDAO();
                    $dao->add($name, $url_img);
                    break;

                default:
                    die("Type d'attribut invalide.");
            }

            header("Location: index.php?action=index&message=" . urlencode("Attribut ajouté !"));
            exit;
        }

        echo $this->templates->render('add-attribut');
    }
}
