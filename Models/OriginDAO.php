<?php

namespace Models;

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
}
