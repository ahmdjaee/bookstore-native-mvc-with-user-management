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

    public function getAll(int $page, int $limit ): array
    {

        $sql = "SELECT * FROM authors ORDER BY name ASC LIMIT $limit OFFSET $page";

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
}
