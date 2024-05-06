<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PDO;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Publisher;

class PublisherRepository
{
    private PDO $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
    }

    public function save(Publisher $publisher): Publisher
    {
        $sql = "INSERT INTO publishers (name, address) VALUES (:name, :address)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $publisher->name,
            'address' => $publisher->address
        ]);

        return $publisher;
    }

    public function update()
    {
    }

    public function findById(int $id): ?Publisher
    {
        $sql = "SELECT * FROM publishers WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $row =  $statement->execute(['id' => $id]);

        try {
            if ($row = $statement->fetch()) {
                return new Publisher(
                    id: $row['id'],
                    name: $row['name'],
                    address: $row['address']
                );
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(int $id)
    {
        try {
            $sql = "DELETE FROM publishers WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->execute(['id' => $id]);
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll()
    {
        $sql = "DELETE FROM publishers";
        $this->connection->exec($sql);
    }

    public function findAll(): array
    {
        $sql = "SELECT * FROM publishers ORDER BY id DESC";
        $statement = $this->connection->query($sql);
        $result = [];

        while ($row = $statement->fetch()) {
            $result[] = new Publisher(
                id: $row['id'],
                name: $row['name'],
                address: $row['address']
            );
        }

        return $result;
    }

    public function search(string $keyword): array
    {
        $sql = "SELECT * FROM publishers WHERE name LIKE ? OR address LIKE ? ORDER BY id DESC";
        $statement = $this->connection->prepare($sql);
        $statement->execute(["%$keyword%", "%$keyword%"]);

        $result = [];

        while ($row = $statement->fetch()) {
            $result[] = new Publisher(
                id: $row['id'],
                name: $row['name'],
                address: $row['address']
            );
        }

        return $result;
    }
}
