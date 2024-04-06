<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

require_once __DIR__ . '/../../vendor/autoload.php';

use RootNameSpace\Belajar\PHP\MVC\Domain\Books;

class BookRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Books $books): Books
    {

        $sql = "INSERT INTO books (id, name, genre, release_date, author_id, pages) VALUES (:id, :name, :genre, :release_date, :author_id, :pages)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $books->id,
            'name' => $books->name,
            'genre' => $books->genre,
            'release_date' => $books->releaseDate,
            'author_id' => $books->authorId,
            'pages' => $books->pages
        ]);

        return $books;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM books ORDER BY name ASC LIMIT 20";

        $statement = $this->connection->query($sql);
        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                id: $row['id'],
                name: $row['name'],
                genre: $row['genre'],
                releaseDate: $row['release_date'],
                authorId: $row['author_id'],
                pages: $row['pages']
            );
        }
        return $array;
    }

    public function findById(string $id): Books
    {

        $sql = "SELECT * FROM books WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();
        return new Books(
            id: $row['id'],
            name: $row['name'],
            genre: $row['genre'],
            releaseDate: $row['release_date'],
            authorId: $row['author_id'],
            pages: $row['pages']
        );
    }

    public function remove(string $id)
    {
        $sql = "DELETE FROM books WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);
    }

    public function removeAll(): void
    {
        $this->connection->exec("DELETE from books");
    }

    public function search(string $keyword): array
    {
        $sql = "SELECT * FROM books Where name LIKE ? OR genre LIKE ? OR author_id LIKE ?";
        $statement = $this->connection->prepare($sql);

        $statement->execute(['%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%']);

        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                id: $row['id'],
                name: $row['name'],
                genre: $row['genre'],
                releaseDate: $row['release_date'],
                authorId: $row['author_id'],
                pages: $row['pages']
            );
        }

        return $array;
    }
}
