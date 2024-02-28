<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Session;
use RootNameSpace\Belajar\PHP\MVC\Domain\Users;

class SessionRepositoryTest extends TestCase
{

    private SessionRepository $sessionRepository;
    private UserRepository $userRepository;

    protected function setUp(): void
    {
        $this->userRepository = new UserRepository(Database::getConnection());
        $this->sessionRepository = new SessionRepository(Database::getConnection());

        $this->sessionRepository->removeAll();
        $this->userRepository->removeAll();
    }


    public function testSaveSuccess()
    {
        $user = new Users(
            username: "ahmdjaee",
            name: "ahmdjaee",
            password: "ahmdjaee",
            createdAt: date("Y/m/d"),
        );

        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->username = $user->username;

        $result = $this->sessionRepository->save($session);

        $this->assertequals($session->id, $result->id);
        $this->assertequals($session->username, $result->username);
    }

    // public function testSaveFailed()
    // {
    // }

    public function testFindUsernameSuccess()
    {

        $user = new Users(
            username: "ahmdjaee",
            name: "ahmdjaee",
            password: "ahmdjaee",
            createdAt: date("Y/m/d"),
        );

        $this->userRepository->save($user);

        $session = new Session();
        $session->id = uniqid();
        $session->username = $user->username;

        $resultSession = $this->sessionRepository->save($session);
        $result = $this->sessionRepository->findById($resultSession->id);
        self::assertNotNull($result);
    }

    public function testFindUsernameFailed()
    {
        $result = $this->sessionRepository->findById('notfound');
        self::assertNull($result);
    }

    public function testRemoveAll()
    {
    }
}
