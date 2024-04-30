<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use RootNameSpace\Belajar\PHP\MVC\Domain\Author;

class AuthorRepository
{

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Author $author): Author
    {

        $sql = "INSERT INTO authors (id, name, email, birthdate, place_of_birth) VALUES (:id, :name, :email, :birthdate, :place_of_birth)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $author->id,
            'name' => $author->name,
            'email' => $author->email,
            'birthdate' => $author->birthdate,
            'place_of_birth' => $author->placeOfBirth
        ]);

        return $author;
    }

    public function getAll(int $page, int $limit): array
    {

        $sql = "SELECT * FROM authors ORDER BY id DESC";

        $statement = $this->connection->query($sql);

        $array = [];
        while ($row = $statement->fetch()) {
            $array[] = new Author(
                id: $row['id'],
                name: $row['name'],
                email: $row['email'],
                birthdate: $row['birthdate'],
                placeOfBirth: $row['place_of_birth']
            );
        }

        return $array;
    }

    public function remove(string $id)
    {
        try {
            $sql = "DELETE FROM authors WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->execute(['id' => $id]);
        } finally {
            $statement->closeCursor();
        }
    }

    public function findById(string $id): ?Author
    {

        $sql = "SELECT * FROM authors WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();

        try {
            if ($row) {
                return new Author(
                    id: $row['id'],
                    name: $row['name'],
                    email: $row['email'],
                    birthdate: $row['birthdate'],
                    placeOfBirth: $row['place_of_birth']
                );
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function update(Author $author): Author
    {
        $sql = "UPDATE authors SET name = :name, email = :email, birthdate = :birthdate, place_of_birth = :place_of_birth WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $author->id,
            'name' => $author->name,
            'email' => $author->email,
            'birthdate' => $author->birthdate,
            'place_of_birth' => $author->placeOfBirth

        ]);

        return $author;
    }
}
