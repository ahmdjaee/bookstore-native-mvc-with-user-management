<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;

class DashboardController
{
    public function dashboard()
    {
        View::render('Dashboard/dashboard');
    }
}
