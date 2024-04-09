<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

class DashboardRepository{

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function getAll(): array{

        $sql = "SELECT * FROM books";
    }
}