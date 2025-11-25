<?php

namespace Models;

class ElementDAO extends BasePDODAO
{
    public function getAll(): array
    {
        $sql = "SELECT * FROM element ORDER BY name ASC";
        return $this->execRequest($sql)->fetchAll();
    }

    public function getById(int $id): ?array
    {
        $sql = "SELECT * FROM element WHERE id = ?";
        $result = $this->execRequest($sql, [$id])->fetch();

        return $result ?: null;
    }

    public function add(string $name, string $color, string $url_img): void
    {
        $sql = "INSERT INTO element (name, color, url_img) VALUES (?, ?, ?)";
        $this->execRequest($sql, [$name, $color, $url_img]);
    }
}
