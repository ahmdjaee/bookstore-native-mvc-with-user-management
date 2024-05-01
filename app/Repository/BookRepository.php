<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Books;

class BookRepository
{
    // private \PDO $connection;
    private PDO $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
    }

    public function save(Books $books): Books
    {

        $sql = "INSERT INTO books (id, name, genre, release_date, author_id, synopsis , pages) VALUES (:id, :name, :genre, :release_date, :author_id, :synopsis , :pages)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $books->id,
            'name' => $books->name,
            'genre' => $books->genre,
            'release_date' => $books->releaseDate,
            'author_id' => $books->authorId,
            'synopsis' => $books->synopsis,
            'pages' => $books->pages
        ]);

        return $books;
    }

    public function update(Books $books): Books
    {

        $sql = "UPDATE books SET name = :name, genre = :genre, release_date = :release_date, author_id = :author_id, synopsis = :synopsis, pages = :pages WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $books->id,
            'name' => $books->name,
            'genre' => $books->genre,
            'release_date' => $books->releaseDate,
            'author_id' => $books->authorId,
            'synopsis' => $books->synopsis,
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
                synopsis: $row['synopsis'],
                pages: $row['pages']
            );
        }
        return $array;
    }

    public function findById(string $id): ?Books
    {
        $sql = "SELECT * FROM books WHERE id = :id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['id' => $id]);
        $row = $statement->fetch();

        try {
            if ($row) {
                return new Books(
                    id: $row['id'],
                    name: $row['name'],
                    genre: $row['genre'],
                    releaseDate: $row['release_date'],
                    authorId: $row['author_id'],
                    synopsis: $row['synopsis'],
                    pages: $row['pages']
                );
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function remove(string $id)
    {
        try {
            $sql = "DELETE FROM books WHERE id = :id";
            $statement = $this->connection->prepare($sql);
            $statement->execute(['id' => $id]);
        } finally {
            $statement->closeCursor();
        }
    }

    public function removeAll(): void
    {
        $this->connection->exec("DELETE from books");
    }

    public function search(string $keyword = "", int $page = 1, int $limit = 15): array
    {

        // $page = 1;
        // $limit = 6;
        // $perPage = $limit / $page;
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM books Where name LIKE ? OR genre LIKE ? OR author_id LIKE ? ORDER BY id DESC LIMIT $limit OFFSET $offset";
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
                synopsis: $row['synopsis'],
                pages: $row['pages']
            );
        }

        return $array;
    }
}
