<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Author;

class AuthorRepositoryTest extends TestCase
{
    private AuthorRepository $repository;
    protected function setUp(): void
    {
        $this->repository = new AuthorRepository(Database::getConnection());
        // $this->repository->removeAll();
    }

    public function testSaveSuccess()
    {

        $author = new Author(
            name: "Author -2",
            email: "test",
            birthdate: "test",
            placeOfBirth: "test"
        );

        $result = $this->repository->save($author);

        $this->assertEquals($author->id, $result->id);
    }

    public function testGetAllSuccess()
    {
        $result = $this->repository->getAll(1, 10);

        $this->assertNotNull($result);
    }
}
