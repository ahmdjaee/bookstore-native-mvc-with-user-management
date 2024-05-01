<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;

class HomeController
{
    private Container $container;
    private BookService $bookService;

    public function __construct()
    {
        $this->container = new Container();
        $this->bookService = $this->container->get(BookService::class);
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
