<?php
// Charger l'autoloader
require_once 'Helpers/Psr4AutoloaderClass.php';

// Création de notre loader
$loader = new Helpers\Psr4AutoloaderClass();
$loader->register();

// Enregistrement des namespaces existants
$loader->addNamespace('\Helpers', 'Helpers');
$loader->addNamespace('\League\Plates', 'Vendor/Plates/src');


use League\Plates\Engine;

// On instancie le moteur Plates
$templates = new Engine('Views');

// On affiche la vue home
echo $templates->render('home', ['gameName' => 'Zenless Zone Zero']);
