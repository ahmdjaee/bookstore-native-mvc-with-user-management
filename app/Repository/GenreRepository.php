<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PDO;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Genre;

class GenreRepository
{
    private PDO $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
    }

    public function save(Genre $genre): Genre
    {
        $sql = "INSERT INTO genres (name) VALUES (:name)";
        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'name' => $genre->name,
        ]);

        return $genre;
    }

    public function update()
    {
    }

    public function findById(int $id): ?Genre
    {
        $sql = "SELECT * FROM genres WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $row =  $statement->execute(['id' => $id]);

        try {
            if ($row = $statement->fetch()) {
                return new Genre(
                    id: $row['id'],
                    name: $row['name'],
                );
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteById(int $id): void
    {
        try {
            $sql = "DELETE FROM publishers WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->execute(['id' => $id]);
        } finally {
            $statement->closeCursor();
        }
    }

    public function deleteAll(): void
    {
        $sql = "DELETE FROM publishers";
        $this->connection->exec($sql);
    }

    public function findAll()
    {
    }

    public function search(string $keyword): array
    {
        $sql = "SELECT * FROM genres WHERE name LIKE ? ORDER BY id DESC";
        $statement = $this->connection->prepare($sql);
        $statement->execute(["%$keyword%"]);

        $result = [];

        while ($row = $statement->fetch()) {
            $result[] = new Genre(
                name: $row['name']
            );
        }

        return $result;
    }
}
