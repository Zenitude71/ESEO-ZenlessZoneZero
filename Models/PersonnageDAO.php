<?php

namespace Models;

use PDO;

class PersonnageDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = "SELECT 
            p.id, p.name, p.element, p.unitclass, p.origin, p.rarity, p.url_img,
            e.color AS element_color
            FROM personnage p
            JOIN element e ON e.id = p.element";

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
        $sql = "SELECT 
            p.id, p.name, p.element, p.unitclass, p.origin, p.rarity, p.url_img,
            e.color AS element_color
            FROM personnage p
            JOIN element e ON e.id = p.element
            WHERE p.id = ?";

        $stmt = $this->execRequest($sql, [$idPersonnage]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($row === false) {
            return null;
        }

        return new Personnage($row);
    }

    public function add(string $name, string $element, string $unitclass, ?string $origin, int $rarity, string $url_img): void
    {
        if ($origin === "" || $origin === null) {
            $origin = null;
        }

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
