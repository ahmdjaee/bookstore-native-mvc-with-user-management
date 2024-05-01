<?php

namespace RootNameSpace\Belajar\PHP\MVC\Middleware;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Repository\SessionRepository;
use RootNameSpace\Belajar\PHP\MVC\Repository\UserRepository;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class MustNotLoginMiddleware implements Middleware
{
    private SessionService $sessionService;

    public function __construct()
    {
        // $sessionRepository = new SessionRepository(Database::getConnection());
        // $userRepository = new UserRepository(Database::getConnection());
        // $this->sessionService = new SessionService($sessionRepository, $userRepository);

        $container = new Container();
        $this->sessionService = $container->get(SessionService::class);
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user != null) {
            View::redirect('/');
        }
    }
}
