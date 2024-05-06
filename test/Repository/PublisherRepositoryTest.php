<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Publisher;

class PublisherRepositoryTest extends TestCase
{

    private PublisherRepository $repository;
    protected function setUp(): void
    {
        $database = new Database();
        $this->repository = new PublisherRepository($database);
        $this->repository->deleteAll();
    }
    public function testSaveSuccess()
    {
        $publisher = new Publisher(
            name: "test",
            address: "test"
        );

        $result = $this->repository->save($publisher);

        self::assertEquals($publisher->name, $result->name);
        self::assertEquals($publisher->address, $result->address);
    }

    public function testFindByIdNotFound()
    {
        $result = $this->repository->findById(-1);
        self::assertNull($result);
    }

    public function testSearchSuccess()
    {
        $this->testSaveSuccess();
        $result = $this->repository->search("test");

        self::assertCount(1, $result);
    }
}
