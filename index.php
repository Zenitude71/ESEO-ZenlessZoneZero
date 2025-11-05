<?php
// Active le rapport d’erreurs pendant le développement
error_reporting(E_ALL);
ini_set('display_errors', '1');

// ----------------------------------------------------------
// 1. Chargement automatique des classes (Autoload PSR-4)
// ----------------------------------------------------------
require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();

// Enregistrement des namespaces utilisés dans le projet
$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('Controllers', __DIR__ . '/Controllers');
$loader->addNamespace('Models', __DIR__ . '/Models');
$loader->addNamespace('Config', __DIR__ . '/Config');

// Si tu utilises Plates pour les vues :
$loader->addNamespace('League\\Plates', __DIR__ . '/Vendor/Plates/src');

// ----------------------------------------------------------
// 2. Exécution du contrôleur principal
// ----------------------------------------------------------
use Controllers\MainController;

// On crée une instance du contrôleur principal
$controller = new MainController();

// On appelle la méthode index() par défaut
$controller->index();
