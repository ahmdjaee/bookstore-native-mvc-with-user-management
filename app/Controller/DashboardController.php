<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Repository\AuthorRepository;
use RootNameSpace\Belajar\PHP\MVC\Repository\BookRepository;
use RootNameSpace\Belajar\PHP\MVC\Service\AuthorService;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;

class DashboardController
{
    public function __construct(protected BookService $bookService)
    {
    }

    public function dashboard()
    {
        $model = [];

        try {
            $model['books'] = $this->bookService->search();
        } catch (ValidationException $e) {
            $model['error'] = $e->getMessage();
        }
        View::render('Dashboard/dashboard', $model);
    }
}
