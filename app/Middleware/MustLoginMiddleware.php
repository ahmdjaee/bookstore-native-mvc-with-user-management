<?php

namespace RootNameSpace\Belajar\PHP\MVC\Middleware;

use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class MustLoginMiddleware implements Middleware
{
    public function __construct(
        protected SessionService $sessionService
    ) {
    }

    function before(): void
    {
        $user = $this->sessionService->current();
        if ($user == null) {
            View::redirect('/users/login');
        }
    }
}
