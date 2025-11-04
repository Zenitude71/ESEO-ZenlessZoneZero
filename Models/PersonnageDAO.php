<?php

namespace Models;

use Exception;
use PDO;
use PDOStatement;

class PersonnageDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = "SELECT id, name, element, unitclass, origin, rarity, url_img 
                FROM personnage";

        $stmt = $this->execRequest($sql);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $personnages = [];
        foreach ($rows as $row) {
            $personnages[] = new Personnage($row);
        }

        return $personnages;
    }

    public function getByID(string $idPersonnage): ?Personnage
    {
        $sql = "SELECT id, name, element, unitclass, origin, rarity, url_img 
                FROM personnage 
                WHERE id = ?";

        $stmt = $this->execRequest($sql, [$idPersonnage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return new Personnage($row);
    }
}
