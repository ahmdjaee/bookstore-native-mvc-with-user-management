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

        $sql = "INSERT INTO books (book_id, name, genre, release_date, author) VALUES (:book_id, :name, :genre, :release_date, :author)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'book_id' => $books->bookId,
            'name' => $books->name,
            'genre' => $books->genre,
            'release_date' => $books->releaseDate,
            'author' => $books->author
        ]);

        return $books;
    }

    public function getAll(): array
    {
        $sql = "SELECT * FROM books";

        $statement = $this->connection->query($sql);
        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                bookId: $row['book_id'],
                name: $row['name'],
                genre: $row['genre'],
                releaseDate: $row['release_date'],
                author: $row['author']
            );
        }
        return $array;
    }

    public function findById(string $id): Books
    {

        $sql = "SELECT * FROM books WHERE book_id = :book_id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['book_id' => $id]);
        $row = $statement->fetch();
        return new Books(
            bookId: $row['book_id'],
            name: $row['name'],
            genre: $row['genre'],
            releaseDate: $row['release_date'],
            author: $row['author']
        );
    }

    public function remove(string $id)
    {
        $sql = "DELETE FROM books WHERE book_id = :book_id";
        $statement = $this->connection->prepare($sql);
        $statement->execute(['book_id' => $id]);
    }

    public function removeAll(): void
    {
        $this->connection->exec("DELETE from books");
    }

    public function search(string $keyword): array
    {
        $sql = "SELECT * FROM books Where name LIKE ? OR genre LIKE ? OR author LIKE ?";
        $statement = $this->connection->prepare($sql);

        $statement->execute(['%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%']);

        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                bookId: $row['book_id'],
                name: $row['name'],
                genre: $row['genre'],
                releaseDate: $row['release_date'],
                author: $row['author']
            );
        }

        return $array;
    }
}
