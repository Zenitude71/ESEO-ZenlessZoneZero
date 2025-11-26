# Zenless Zone Zero - Projet PHP/MySQL

## Description

Cette application PHP utilise PDO pour gérer une base de données MySQL de personnages et leurs attributs (Element, Origin, UnitClass).  
Elle suit l'architecture MVC et utilise **Plates** pour le rendu des templates.

## Prérequis

- PHP >= 8.x
- MySQL (via **XAMPP**)
- MySQL Workbench (pour exécuter les scripts SQL)
- PhpStorm

## Installation

### 1. Base de données MySQL

1. Démarre **XAMPP** et assure-toi que MySQL est actif.
2. Ouvre **MySQL Workbench** et connecte-toi à ton serveur MySQL.
3. Crée une nouvelle base de données, par exemple :

Exécute les scripts SQL fournis dans l’ordre :
- script_de_creation.sql;
- script_insertion_de_donnees.sql;


Vérifie que les tables suivantes existent :
- element
- origin
- unitclass
- personnage

### 2. Configuration PHP

Copie le fichier Config/dev.ini et configure les paramètres MySQL :
dsn = "mysql:host=localhost;dbname=zenless_zone_zero;charset=utf8mb4"
user = "root"
pass = ""

### 3. Lancer le serveur Web via PhpStorm

#### Ouvre le projet dans PhpStorm.

- Va dans File > Settings > PHP > Built-in Web Server (ou Preferences sur macOS).
- Configure le Document root sur le dossier racine du projet.
- Choisis un Port (ex: 8000).
- Clique sur Start Server.
- Accède à l’application dans ton navigateur à l’URL : http://localhost:8000/index.php

#### Utilisation

- Liste des personnages : http://localhost:8000/index.php
- Ajouter un personnage : http://localhost:8000/index.php?action=add-perso
- Modifier un personnage : http://localhost:8000/index.php?action=edit-perso&id={id}
- Supprimer un personnage : http://localhost:8000/index.php?action=del-perso&id={id}
- Ajouter un attribut (Element, Origin, UnitClass) : http://localhost:8000/index.php?action=add-attribut

#### Architecture

- Controllers : Gestion de la logique de l'application.
- Models : DAO et entités pour accéder aux données.
- Views : Templates Plates pour l’affichage.
- Config : Paramètres de connexion à la base.
- Router : Gestion des routes et des actions GET/POST.

#### Notes

- Les entités sont hydratées automatiquement à partir des données SQL.
- Les requêtes utilisent PDO avec des requêtes préparées pour la sécurité.
- L’élément d’un personnage possède une couleur HEX et une image associée.
- Les DAO gèrent séparément Element, Origin et UnitClass.
