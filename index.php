<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();

// Enregistrement des namespaces
$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('Controllers', __DIR__ . '/Controllers');
$loader->addNamespace('Models', __DIR__ . '/Models');
$loader->addNamespace('Config', __DIR__ . '/Config');
$loader->addNamespace('League\\Plates', __DIR__ . '/Vendor/Plates/src');

// Import du router
use Controllers\Router\Router;

try {
    $router = new Router();
    $router->routing($_GET, $_POST);
} catch (Exception $e) {
    echo "<h1>Erreur 404</h1><p>{$e->getMessage()}</p>";
}
