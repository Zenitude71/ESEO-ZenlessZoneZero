<?php

namespace Models;

use PDO;
use PDOException;
use Config\Config;
use Exception;
use PDOStatement;

abstract class BasePDODAO
{
    private static ?PDO $db = null;

    protected function getDB(): PDO
    {
        if (self::$db === null) {
            try {
                $dsn  = Config::get('dsn');
                $user = Config::get('user');
                $pass = Config::get('pass');

                if (!$dsn) {
                    throw new Exception("DSN vide dans le fichier de configuration !");
                }

                self::$db = new PDO($dsn, $user, $pass);

                self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
                self::$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                throw new Exception('Erreur de connexion à la base de données : ' . $e->getMessage());
            }
        }

        return self::$db;
    }

    protected function execRequest(string $sql, ?array $params = null): PDOStatement
    {
        try {
            $db   = $this->getDB();
            $stmt = $db->prepare($sql);
            $stmt->execute($params ?? []);
            return $stmt;
        } catch (PDOException $e) {
            throw new Exception('Erreur lors de l’exécution de la requête : ' . $e->getMessage());
        }
    }
}
