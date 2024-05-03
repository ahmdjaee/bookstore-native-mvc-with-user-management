<?php

use RootNameSpace\Belajar\PHP\MVC\App\Router;
use RootNameSpace\Belajar\PHP\MVC\Controller\AuthorController;
use RootNameSpace\Belajar\PHP\MVC\Controller\BooksController;
use RootNameSpace\Belajar\PHP\MVC\Controller\DashboardController;
use RootNameSpace\Belajar\PHP\MVC\Controller\HomeController;
use RootNameSpace\Belajar\PHP\MVC\Controller\UsersController;
use RootNameSpace\Belajar\PHP\MVC\Middleware\MustLoginMiddleware;
use RootNameSpace\Belajar\PHP\MVC\Middleware\MustNotLoginMiddleware;

require_once __DIR__ . '/../vendor/autoload.php';

Router::add('GET', '/users/register', [UsersController::class, 'register'], [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/register', [UsersController::class, 'postRegister'], [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/login', [UsersController::class, 'login'],  [MustNotLoginMiddleware::class]);
Router::add('POST', '/users/login', [UsersController::class, 'postLogin'],  [MustNotLoginMiddleware::class]);
Router::add('GET', '/users/logout', [UsersController::class, 'logout'],  [MustNotLoginMiddleware::class]);

Router::add('GET', '/authors', [AuthorController::class, 'author'], [MustLoginMiddleware::class]);
Router::add('POST', '/authors', [AuthorController::class, 'postAuthor'], [MustLoginMiddleware::class]);
Router::add('POST', '/authors/([0-9a-zA-Z]*)/update', [AuthorController::class, 'updateById'], [MustLoginMiddleware::class]);
Router::add('GET', '/authors/([0-9a-zA-Z]*)/delete', [AuthorController::class, 'removeAuthor'], [MustLoginMiddleware::class]);

Router::add('GET', '/dashboard', [DashboardController::class, 'dashboard'], [MustLoginMiddleware::class]);

Router::add('GET', '/books', [BooksController::class, 'index'], [MustLoginMiddleware::class]);
Router::add('POST', '/books', [BooksController::class, 'postAddBook'], [MustLoginMiddleware::class]);
Router::add('GET', '/books/([0-9a-zA-Z]*)/delete', [BooksController::class, 'removeBook'], [MustLoginMiddleware::class]);
Router::add('POST', '/books/([0-9a-zA-Z]*)/update', [BooksController::class, 'updateBook'], [MustLoginMiddleware::class]);

// Get Book Detail Api
Router::add('GET', '/api/books/([0-9a-zA-Z]*)', [BooksController::class, 'getById']);

Router::add('GET', '/api/authors/([0-9a-zA-Z]*)', [AuthorController::class, 'getById']);

Router::add('GET', '/', [HomeController::class, 'home']);
Router::add('GET', '/search', [HomeController::class, 'search']);
Router::add('GET', '/detail/([0-9a-zA-Z]*)', [HomeController::class, 'detail']);

Router::run();
