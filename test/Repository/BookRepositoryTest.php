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
            name: "test",
            genre: "test",
            releaseDate: "test",
            author: "test"
        );

        $result = $this->repository->save($book);

        $this->assertEquals($book->bookId, $result->bookId);
    }

    public function testGetAllSuccess()
    {

        $book = new Books(
            name: "test",
            genre: "test",
            releaseDate: "test",
            author: "test"
        );

        $this->repository->save($book);

        $result = $this->repository->getAll();

        $this->assertCount(1, $result);
    }
}
