<?php

namespace Models;

/**
 * Gestion des opérations CRUD sur la table `origin`.
 * Permet de récupérer toutes les origines, une origine par ID,
 * et d'ajouter une nouvelle origine avec son nom et son image.
 *
 * @package Models
 */
class OriginDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM origin ORDER BY name ASC";
        return $this->execRequest($sql)->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM origin WHERE id = ?";
        $result = $this->execRequest($sql, [$id])->fetch();

        return $result ?: null;
    }

    public function add(string $name, string $url_img): void
    {
        $sql = "INSERT INTO origin (name, url_img) VALUES (?, ?)";
        $this->execRequest($sql, [$name, $url_img]);
    }
}
