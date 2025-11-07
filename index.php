<?php
// Active l’affichage des erreurs PHP
error_reporting(E_ALL);
ini_set('display_errors', '1');

// Chargement automatique (PSR-4)
require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();

// Déclaration des namespaces
$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('Controllers', __DIR__ . '/Controllers');
$loader->addNamespace('Models', __DIR__ . '/Models');
$loader->addNamespace('Config', __DIR__ . '/Config');
$loader->addNamespace('League\\Plates', __DIR__ . '/Vendor/Plates/src');

// Import du Router
use Controllers\Router\Router;

try {
    // Création du routeur
    $router = new Router('action');

    // Lancement du routage
    $router->routing($_GET, $_POST);

} catch (Exception $e) {
    // Gestion propre des erreurs
    http_response_code(500);
    echo "<h1>Erreur interne du serveur</h1>";
    echo "<p>" . htmlspecialchars($e->getMessage()) . "</p>";
}
