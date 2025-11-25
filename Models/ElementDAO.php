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
}
