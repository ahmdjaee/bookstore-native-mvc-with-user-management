<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
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
        $model = [];
        try {
            $search = $_GET['search'] ?? '';
            $books =  $this->bookService->search($search);
            $model['books'] = $books;
        } catch (ValidationException $e) {
            $model['booksError'] = $e->getMessage();
        }
        View::render('Home/search', $model);
    }

    public function detail()
    {
        View::render('Home/detail');
    }
}
