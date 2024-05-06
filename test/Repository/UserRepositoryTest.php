<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use DateTime;
use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Users;

class UserRepositoryTest extends TestCase
{
    private UserRepository $repository;

    protected function setUp(): void
    {
        $database = new Database();
        $this->repository = new UserRepository($database);
        $this->repository->removeAll();
    }

    public function testSaveSuccess()
    {

        $users = new Users(
            username: "test",
            name: "test",
            password: "test",
            createdAt: date("Y/m/d"),
        );

        $result = $this->repository->save($users);

        $this->assertEquals($users->username, $result->username);
        $this->assertEquals($users->password, $result->password);
        $this->assertSame($users->createdAt, $result->createdAt);
    }

    public function testFindUsernameSuccess(){

        $users = new Users(
            username: "username",
            name: "test",
            password: "test",
            createdAt: date("Y/m/d"),
        );

        $this->repository->save($users);

        $result = $this->repository->findUsername("username");

        $this->assertEquals($users->username, $result->username);
    }
}
