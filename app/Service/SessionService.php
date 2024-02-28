<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use RootNameSpace\Belajar\PHP\MVC\Domain\Session;
use RootNameSpace\Belajar\PHP\MVC\Domain\Users;
use RootNameSpace\Belajar\PHP\MVC\Repository\SessionRepository;
use RootNameSpace\Belajar\PHP\MVC\Repository\UserRepository;

class SessionService
{

    private SessionRepository $sessionRepository;
    private UserRepository $userRepositry;
    public const COOKIE_NAME = 'LOGIN-SESSION';

    public function __construct(SessionRepository $sessionRepository, UserRepository $userRepositry)
    {
        $this->sessionRepository = $sessionRepository;
        $this->userRepositry = $userRepositry;
    }

    public function create(string $username): Session
    {

        $session = new Session();

        $session->id = uniqid();
        $session->username = $username;
        $this->sessionRepository->save($session);

        setcookie(self::COOKIE_NAME, $session->id, time() + 3600, '/');

        return $session;
    }

    public function current(): ?Users
    {
        $sessionId = $_COOKIE[self::COOKIE_NAME] ?? '';

        $session = $this->sessionRepository->findById($sessionId);
        if($session == null){
            return null;
        }

        return $this->userRepositry->findUsername($session->username);
    }

    public function destroy()
    {

        $sessionId = $_COOKIE[self::COOKIE_NAME];

        setcookie(self::COOKIE_NAME, '', time() - 3600, '/');
    }
}
