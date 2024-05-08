<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;
use RootNameSpace\Belajar\PHP\MVC\Service\AuthorService;
use RootNameSpace\Belajar\PHP\MVC\Service\BookService;
use RootNameSpace\Belajar\PHP\MVC\Service\GenreService;
use RootNameSpace\Belajar\PHP\MVC\Service\PublisherService;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class BooksController
{
    function __construct(
        protected BookService $bookService,
        protected SessionService $sessionService,
        protected AuthorService $authorService,
        protected PublisherService $publisherService,
        protected GenreService $genreService
    ) {
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
                $books =  $this->bookService->search($search);
                $genre = $this->genreService->findAll();
                $authors = $this->authorService->findAll();
                $publisher = $this->publisherService->findAll();
                $model['books'] = $books;
                $model['genres'] = $genre;
                $model['authors'] = $authors;
                $model['publishers'] = $publisher;
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
                $request = new BooksListRequest(
                    name: $_POST['name'],
                    image: $_POST['image'],
                    genreId: $_POST['genreId'],
                    releaseDate: $_POST['releaseDate'],
                    authorId: $_POST['authorId'],
                    synopsis: $_POST['synopsis'],
                    pages: $_POST['pages'],
                    publisherId: $_POST['publisherId'],
                    price: $_POST['price'],
                    stock: $_POST['stock'],
                );
                $success = $this->bookService->add($request);
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
                $request = new BooksListRequest(
                    name: $_POST['name'],
                    image: $_POST['image'],
                    genreId: $_POST['genreId'],
                    releaseDate: $_POST['releaseDate'],
                    authorId: $_POST['authorId'],
                    synopsis: $_POST['synopsis'],
                    pages: $_POST['pages'],
                    publisherId: $_POST['publisherId'],
                    price: $_POST['price'],
                    stock: $_POST['stock'],
                );
                $success = $this->bookService->updateById($id, $request);
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
            $this->bookService->removeById($id);
            $books = $this->bookService->search($search);
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
            $detail = $this->bookService->getById($id);
            $author = $this->authorService->getById($detail->authorId);

            if ($detail != null) {
                header('Content-Type: application/json');
                echo json_encode(['data' => [
                    'id' => $detail->id,
                    'name' => $detail->name,
                    'image' => $detail->image,
                    'genreId' => $detail->genreId,
                    'releaseDate' => $detail->releaseDate,
                    'synopsis' => $detail->synopsis,
                    'pages' => $detail->pages,
                    'author' => $author,
                    'publisherId' => $detail->publisherId,
                    'price' => $detail->price,
                    'stock' => $detail->stock

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
