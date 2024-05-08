<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Author;
use RootNameSpace\Belajar\PHP\MVC\Model\AuthorRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\AuthorRepository;

class AuthorServiceTest extends TestCase
{

    private AuthorRepository $repository;
    private AuthorService $service;

    protected function setUp(): void
    {
        $database = new Database();
        $this->repository = new AuthorRepository($database);
        $this->service = new AuthorService($this->repository);

        (Database::getConnection())->query("DELETE FROM books");
        (Database::getConnection())->query("DELETE FROM authors");
    }

    public function testAdd()
    {

        $request = new AuthorRequest(
            name: "Author -2",
            email: "test",
            birthdate: "test",
            placeOfBirth: "test"
        );

        $response = $this->service->add($request);

        $this->assertNotNull($response);
        $this->assertEquals($request->name, "Author -2");
    }
    public function testShowAll()
    {

        $request = new AuthorRequest(
            name: "Author -2",
            email: "test",
            birthdate: "test",
            placeOfBirth: "test"
        );

        $this->service->add($request);
        $data = $this->service->findAll();

        $this->assertNotNull($data);
    }
}
