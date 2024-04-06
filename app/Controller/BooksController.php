<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\Router;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\BookRepository;
use RootNameSpace\Belajar\PHP\MVC\Repository\SessionRepository;
use RootNameSpace\Belajar\PHP\MVC\Repository\UserRepository;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class BooksController
{
    private $service;
    private SessionService $sessionService;
    function __construct()
    {
        $connection = Database::getConnection();
        $repository = new BookRepository($connection);
        $sessionRepository = new SessionRepository($connection);
        $userRepository = new UserRepository($connection);

        $this->service = new BookService($repository);
        $this->sessionService = new SessionService($sessionRepository, $userRepository);
    }
    public function index()
    {
        $model = [
            "title" => "Bookstore",
        ];

        $session = $this->sessionService->current();

        if ($session == null) {
            View::redirect("/users/login");
        } else {
            if (isset($_GET['search'])) {
                try {
                    $books =  $this->service->search($_GET['search']);
                    $model['books'] = $books;
                } catch (ValidationException $e) {
                    $model['booksError'] = $e->getMessage();
                }
            } else {
                try {
                    $books = $this->service->getAllBooks();
                    $model['books'] = $books;
                } catch (\Throwable $th) {
                    $model['booksError'] = $th->getMessage();
                }
            }
            View::render('Books/books', $model);
        }
    }

    public function postAddBook()
    {
        $model = [
            "title" => "Add new Book",
        ];

        if (isset($_POST['submit'])) {
            try {
                $request = new BooksListRequest();
                $request->name = $_POST['name'];
                $request->genre = $_POST['genre'];
                $request->releaseDate = $_POST['releaseDate'];
                $request->authorId = $_POST['authorId'];
                $request->pages = $_POST['pages'];

                $success = $this->service->addBook($request);
                $model['success'] = 'Successfully added a new book';

                if ($success) {
                    View::redirect('/books');
                    // View::render('Books/books', $model);
                }
                // $_SERVER['REQUEST_METHOD'] = 'GET';
                // View::render('Books/books', $model);

            } catch (ValidationException $e) {
                $model['error'] = $e->getMessage();
                View::render('Books/books', $model);
            }
        }
    }

    public function removeBook(string $id)
    {
        $model = [
            "title" => "Bookstore",
        ];

        try {
            $this->service->removoById($id);
            $books = $this->service->getAllBooks();
            $model['books'] = $books;
            View::render('Books/books', $model);
        } catch (ValidationException $e) {
            $model['error'] = $e;
        }
    }
}
