<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\BookRepository;

class BooksServiceTest extends TestCase
{

    private BookRepository $repository;
    private BookService $service;

    protected function setUp(): void
    {
        $database = new Database();
        $this->repository = new BookRepository($database);
        $this->service = new BookService($this->repository);
    }

    public function testUpdateSuccess()
    {
        $request = new BooksListRequest();

        $request->id = 1;
        $request->name = "test";
        $request->genreId = "test";
        $request->releaseDate = "test";
        $request->authorId = 41;
        $request->synopsis = "test";
        $request->pages = 200;

        $this->service->updateById(288, $request);
    }
}
