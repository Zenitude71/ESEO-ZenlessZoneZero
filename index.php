<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

require_once __DIR__ . '/Helpers/Psr4AutoloaderClass.php';

$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();

$loader->addNamespace('Helpers', __DIR__ . '/Helpers');
$loader->addNamespace('Controllers', __DIR__ . '/Controllers');
$loader->addNamespace('Models', __DIR__ . '/Models');
$loader->addNamespace('Config', __DIR__ . '/Config');

$loader->addNamespace('League\\Plates', __DIR__ . '/Vendor/Plates/src');


use Controllers\MainController;

$controller = new MainController();

$controller->index();
