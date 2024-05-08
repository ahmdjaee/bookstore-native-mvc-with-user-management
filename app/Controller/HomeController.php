<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

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
        $model = [];

        $books =  $this->bookService->search();
        $model['books'] = $books;

        View::render('Home/home', $model);
    }

    public function search()
    {
        $model = [];
        try {
            if (!empty($_GET['keyword'])) {
                $books =  $this->bookService->search($_GET['keyword']);
                $model['books'] = $books;
                View::render('Home/search', $model);
            } else {
                View::redirect("/");
            }
        } catch (ValidationException $e) {
            $model['booksError'] = $e->getMessage();
            View::render('Home/search', $model);
        }
    }

    public function detail()
    {
        View::render('Home/detail');
    }
}
