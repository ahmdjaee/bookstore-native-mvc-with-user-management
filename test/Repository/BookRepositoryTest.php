<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Books;


class BookRepositoryTest extends TestCase
{
    private BookRepository $repository;
    protected function setUp(): void
    {
        $this->repository = new BookRepository(Database::getConnection());
        $this->repository->removeAll();
    }

    public function testSaveSuccess()
    {

        $book = new Books(
            name: "Attack on titan",
            genre: "Action",
            releaseDate: "2122-01-01",
            authorId: 1234567890,
            pages: 100
        );

        $result = $this->repository->save($book);

        $this->assertEquals($book->id, $result->id);
    }

    public function testGetAllSuccess()
    {

        $book = new Books(
            name: "test",
            genre: "test",
            releaseDate: "test",
            authorId: 1234567890,
            pages: 100
        );

        $this->repository->save($book);

        $result = $this->repository->getAll();

        $this->assertCount(1, $result);
    }
}
