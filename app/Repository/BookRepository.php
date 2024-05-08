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
        $sql = "INSERT INTO books VALUES (:id, :name, :image, :genre_id, :release_date, :author_id, :pages, :synopsis ,  :publisher_id, :price, :stock)";

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

        $sql = "UPDATE books SET name = :name, image = :image, genre_id = :genre_id, release_date = :release_date, author_id = :author_id, synopsis = :synopsis, pages = :pages , publisher_id = :publisher_id, price = :price, stock = :stock WHERE id = :id";

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

        $sql = "SELECT
                b.id,
                b.name,
                b.image,
                b.release_date,
                b.synopsis,
                b.pages,
                b.price,
                b.stock,
                a.name as author,
                p.name as publisher,
                g.name as genre
                FROM books as b 
                Inner Join authors as a on b.author_id = a.id
                Inner Join publishers as p on b.publisher_id = p.id
                Inner Join genres as g on b.genre_id = g.id
                where b.name like ? Or a.name like ? Or p.name like ? Or g.name like ? Order by b.id Desc ";

        $statement = $this->connection->prepare($sql);
        $statement->execute(["%$keyword%", "%$keyword%", "%$keyword%", "%$keyword%"]);

        $array = [];

        while ($row = $statement->fetch()) {
            $array[] = new Books(
                id: $row['id'],
                name: $row['name'],
                image: $row['image'],
                genre: $row['genre'],
                releaseDate: $row['release_date'],
                author: $row['author'],
                synopsis: $row['synopsis'],
                pages: $row['pages'],
                publisher: $row['publisher'],
                price: $row['price'],
                stock: $row['stock']
            );
        }

        return $array;
    }

    public function total(): int
    {
        $sql = "SELECT COUNT(*) FROM books";

        $statement = $this->connection->query($sql);
        return (int) $statement->fetchColumn();
    }
}
