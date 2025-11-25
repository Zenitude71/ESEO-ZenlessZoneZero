<?php

namespace Models;

class UnitclassDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM unitclass ORDER BY name ASC";
        return $this->execRequest($sql)->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM unitclass WHERE id = ?";
        $result = $this->execRequest($sql, [$id])->fetch();

        return $result ?: null;
    }

    public function add(string $name, string $url_img): void
    {
        $sql = "INSERT INTO unitclass (name, url_img) VALUES (?, ?)";
        $this->execRequest($sql, [$name, $url_img]);
    }
}
