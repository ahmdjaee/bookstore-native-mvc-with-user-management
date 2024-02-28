<?php

use RootNameSpace\Belajar\PHP\MVC\App\Router;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Controller\AuthorController;
use RootNameSpace\Belajar\PHP\MVC\Controller\BooksController;
use RootNameSpace\Belajar\PHP\MVC\Controller\ProductController;
use RootNameSpace\Belajar\PHP\MVC\Controller\UsersController;
use RootNameSpace\Belajar\PHP\MVC\Middleware\MustLoginMiddleware;
use RootNameSpace\Belajar\PHP\MVC\Middleware\MustNotLoginMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

Router::add('GET', '/users/register', UsersController::class, 'register', [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', UsersController::class, 'postRegister', [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', UsersController::class, 'login',  [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', UsersController::class, 'postLogin',  [MustNotLoginMiddleware::class]);

Router::add('GET', '/author', AuthorController::class, 'author', [MustLoginMiddleware::class]);

Router::add('GET', '/', BooksController::class, 'dashboard', [MustLoginMiddleware::class]);
Router::add('GET', '/remove', BooksController::class, 'removeBook', [MustLoginMiddleware::class]);
Router::add('GET', '/add-book', BooksController::class, 'viewAddBook', [MustLoginMiddleware::class]);
Router::add('GET', '/add-book/([0-9a-zA-Z]*)', BooksController::class, 'viewAddBook', [MustLoginMiddleware::class]);
Router::add('POST', '/add-book', BooksController::class, 'postAddBook', [MustLoginMiddleware::class]);
Router::add('GET', '/register', BooksController::class, 'register', [MustLoginMiddleware::class]);

Router::run();
