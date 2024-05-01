<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;
use RootNameSpace\Belajar\PHP\MVC\Service\AuthorService;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class BooksController
{
    private BookService $service;
    private SessionService $sessionService;
    private AuthorService $authorService;
    function __construct()
    {
        $container = new Container();
        $this->service = $container->get(BookService::class);
        $this->sessionService = $container->get(SessionService::class);
        $this->authorService = $container->get(AuthorService::class);
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

            try {
                $search = $_GET['search'] ?? '';
                $books =  $this->service->search($search);
                $authors = $this->authorService->showAll();
                $model['books'] = $books;
                $model['authors'] = $authors;
            } catch (ValidationException $e) {
                $model['booksError'] = $e->getMessage();
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
                $request->synopsis = $_POST['synopsis'];
                $request->pages = $_POST['pages'];

                $success = $this->service->addBook($request);
                $model['success'] = 'Successfully added a new book';

                if ($success) {
                    View::redirect('/books');
                }
            } catch (ValidationException $e) {
                $model['error'] = $e->getMessage();
                View::redirect('/books');
            }
        }
    }

    public function updateBook(string $id)
    {

        if (isset($_POST['submit'])) {
            try {
                $request = new BooksListRequest();
                $request->name = $_POST['name'];
                $request->genre = $_POST['genre'];
                $request->releaseDate = $_POST['releaseDate'];
                $request->authorId = $_POST['authorId'];
                $request->synopsis = $_POST['synopsis'];
                $request->pages = $_POST['pages'];

                $success = $this->service->updateById($id, $request);
                $model['success'] = 'Successfully update book';

                if ($success) {
                    View::redirect('/books');
                }
            } catch (ValidationException $e) {
                $model['error'] = $e->getMessage();
                View::redirect('/books');
                echo 'Error: ' . $e->getMessage();
            }
        }
    }

    public function removeBook(string $id)
    {
        $model = [
            "title" => "Bookstore",
        ];

        try {
            $search = $_GET['search'] ?? '';
            $this->service->removeById($id);
            $books = $this->service->search($search);
            $model['books'] = $books;
            View::redirect('/books', $model);
        } catch (ValidationException $e) {
            $model['error'] = $e;
            View::redirect('/books', $model);
        }
    }

    public function getById(string $id)
    {
        try {
            $detail = $this->service->getById($id);
            $author = $this->authorService->getById($detail->authorId);

            if ($detail != null) {
                header('Content-Type: application/json');
                echo json_encode(['data' => [
                    'id' => $detail->id,
                    'name' => $detail->name,
                    'genre' => $detail->genre,
                    'releaseDate' => $detail->releaseDate,
                    'synopsis' => $detail->synopsis,
                    'pages' => $detail->pages,
                    'author' => $author
                ]]);
            }
        } catch (ValidationException $e) {
            header('Content-Type: application/json');
            echo json_encode(['errors' => [
                'message' => $e->getMessage()
            ]]);
            http_response_code(404);
        }
    }
}
