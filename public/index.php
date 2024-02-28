<?php

use RootNameSpace\Belajar\PHP\MVC\App\Router;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Controller\AuthorController;
use RootNameSpace\Belajar\PHP\MVC\Controller\BooksController;
use RootNameSpace\Belajar\PHP\MVC\Controller\ProductController;
use RootNameSpace\Belajar\PHP\MVC\Controller\UsersController;


require_once __DIR__ . '/../vendor/autoload.php';

Router::add('GET', '/users/register', UsersController::class, 'register');
Router::add('POST', '/users/register', UsersController::class, 'postRegister');
Router::add('GET', '/users/login', UsersController::class, 'login');
Router::add('POST', '/users/login', UsersController::class, 'postLogin');




Router::add('GET', '/author', AuthorController::class, 'author');

Router::add('GET', '/', BooksController::class, 'dashboard');
Router::add('GET', '/remove', BooksController::class, 'removeBook');
Router::add('GET', '/add-book', BooksController::class, 'viewAddBook');
Router::add('GET', '/add-book/([0-9a-zA-Z]*)', BooksController::class, 'viewAddBook');
Router::add('POST', '/add-book', BooksController::class, 'postAddBook');
Router::add('GET', '/register', BooksController::class, 'register');

Router::run();
