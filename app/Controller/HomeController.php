<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;

class HomeController
{
    public function __construct(protected BookService $bookService)
    {
    }
    public function home()
    {
        View::render('Home/home');
    }

    public function search()
    {
        $books = $this->bookService->search();
        $model = ['books' => $books];
        View::render('Home/search', $model);
    }

    public function detail()
    {
        View::render('Home/detail');
    }
}
