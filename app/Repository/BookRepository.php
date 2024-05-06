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

        $sql = "INSERT INTO books VALUES (:id, :name, :image, :genre_id, :release_date, :author_id, :synopsis , :pages, :publisher_id, :price, :stock)";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $books->id,
            'name' => $books->name,
            'image' => $books->image,
            'genre_id' => $books->genreId,
            'release_date' => $books->releaseDate,
            'author_id' => $books->authorId,
            'synopsis' => $books->synopsis,
            'pages' => $books->pages,
            'publisher_id' => $books->publisherId,
            'price' => $books->price,
            'stock' => $books->stock
        ]);

        return $books;
    }

    public function update(Books $books): Books
    {

        $sql = "UPDATE books SET name = :name, genre_id = :genre_id, release_date = :release_date, author_id = :author_id, synopsis = :synopsis, pages = :pages WHERE id = :id";

        $statement = $this->connection->prepare($sql);
        $statement->execute([
            'id' => $books->id,
            'name' => $books->name,
            'genre_id' => $books->genreId,
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
                genreId: $row['genre_id'],
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
                    image: $row['image'],
                    genreId: $row['genre_id'],
                    releaseDate: $row['release_date'],
                    authorId: $row['author_id'],
                    synopsis: $row['synopsis'],
                    pages: $row['pages'],
                    publisherId: $row['publisher_id'],
                    price: $row['price'],
                    stock: $row['stock']
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
        $offset = ($page - 1) * $limit;

        $sql = "SELECT * FROM books Where name LIKE ? OR genre_id LIKE ? OR author_id LIKE ? ORDER BY id DESC LIMIT $limit OFFSET $offset";
        $statement = $this->connection->prepare($sql);

        $statement->execute(['%' . $keyword . '%', '%' . $keyword . '%', '%' . $keyword . '%']);

        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                id: $row['id'],
                name: $row['name'],
                image: $row['image'],
                genreId: $row['genre_id'],
                releaseDate: $row['release_date'],
                authorId: $row['author_id'],
                synopsis: $row['synopsis'],
                pages: $row['pages'],
                publisherId: $row['publisher_id'],
                price: $row['price'],
                stock: $row['stock']
            );
        }

        return $array;
    }
}
