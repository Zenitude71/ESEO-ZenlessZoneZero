<?php

namespace Config;

use Exception;

class Config {
    private static ?array $param = null;

    /**
     * Renvoie la valeur d'un paramètre de configuration
     * @param string $nom
     * @param mixed $valeurParDefaut
     * @return mixed
     * @throws Exception
     */
    public static function get(string $nom, $valeurParDefaut = null)
    {
        $params = self::getParameter();
        return $params[$nom] ?? $valeurParDefaut;
    }

    /**
     * Renvoie le tableau des paramètres en le chargeant si nécessaire
     * @return array
     * @throws Exception
     */
    private static function getParameter(): array
    {
        if (self::$param === null) {
            // On construit le chemin absolu avec __DIR__
            $cheminFichier = __DIR__ . '/prod.ini';
            if (!file_exists($cheminFichier)) {
                $cheminFichier = __DIR__ . '/dev.ini';
            }

            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé dans $cheminFichier");
            }

            // parse_ini_file renvoie false en cas d'erreur de syntaxe
            $parsed = parse_ini_file($cheminFichier);
            if ($parsed === false) {
                throw new Exception("Erreur de syntaxe dans le fichier ini : $cheminFichier");
            }

            self::$param = $parsed;
        }

        return self::$param;
    }
}
