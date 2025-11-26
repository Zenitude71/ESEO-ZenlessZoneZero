<?php

namespace Config;

use Exception;

/**
 * Gère le chargement et l'accès aux paramètres de configuration du projet.
 * Charge automatiquement un fichier INI (prod.ini ou dev.ini) et stocke les
 * valeurs de manière statique pour éviter des relectures multiples.
 */
class Config {

    /**
     * @var array|null Stocke les paramètres chargés depuis le fichier INI.
     */
    private static ?array $param = null;

    /**
     * Retourne un paramètre de configuration.
     *
     * @param string $nom Nom du paramètre à récupérer.
     * @param mixed|null $valeurParDefaut Valeur retournée si le paramètre n'existe pas.
     * @return mixed La valeur du paramètre ou la valeur par défaut.
     */
    public static function get(string $nom, $valeurParDefaut = null)
    {
        $params = self::getParameter();
        return $params[$nom] ?? $valeurParDefaut;
    }

    /**
     * Charge et retourne les paramètres du fichier INI.
     * Le chargement est effectué une seule fois, puis mis en cache.
     *
     * @throws Exception Si aucun fichier INI valide n'est trouvé.
     * @return array Tableau associatif des paramètres.
     */
    private static function getParameter(): array
    {
        if (self::$param === null) {

            $cheminFichier = __DIR__ . '/prod.ini';
            if (!file_exists($cheminFichier)) {
                $cheminFichier = __DIR__ . '/dev.ini';
            }

            if (!file_exists($cheminFichier)) {
                throw new Exception("Aucun fichier de configuration trouvé dans $cheminFichier");
            }

            $parsed = parse_ini_file($cheminFichier);
            if ($parsed === false) {
                throw new Exception("Erreur de syntaxe dans le fichier ini : $cheminFichier");
            }

            self::$param = $parsed;
        }

        return self::$param;
    }
}
