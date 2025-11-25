<?php

namespace Models;

use PDO;

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

    public function add(string $name, string $element, string $unitclass, string $origin, int $rarity, string $url_img): void
    {
        $sql = "INSERT INTO personnage (name, element, unitclass, origin, rarity, url_img)
                VALUES (?, ?, ?, ?, ?, ?)";
        $this->execRequest($sql, [$name, $element, $unitclass, $origin, $rarity, $url_img]);
    }

    public function update(string $id, string $name, string $element, string $unitclass, string $origin, int $rarity, string $url_img): void
    {
        $sql = "UPDATE personnage 
                SET name = ?, element = ?, unitclass = ?, origin = ?, rarity = ?, url_img = ?
                WHERE id = ?";
        $this->execRequest($sql, [$name, $element, $unitclass, $origin, $rarity, $url_img, $id]);
    }

    public function delete(string $id): void
    {
        $sql = "DELETE FROM personnage WHERE id = ?";
        $this->execRequest($sql, [$id]);
    }
}
