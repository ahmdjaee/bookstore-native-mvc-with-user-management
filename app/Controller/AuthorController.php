<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;

class AuthorController
{
    public function author()
    {
        View::render('Author/author');
    }
}
