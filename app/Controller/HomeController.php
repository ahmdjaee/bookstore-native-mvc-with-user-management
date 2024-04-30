<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;

class HomeController
{
    public function home()
    {
        View::render('Home/home');
    }

    public function search()
    {
        View::render('Home/search');
    }

    public function detail()
    {
        View::render('Home/detail');
    }
}
