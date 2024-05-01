<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use DI\Container;
use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\AuthorRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\AuthorRepository;
use RootNameSpace\Belajar\PHP\MVC\Resource\JsonResource;
use RootNameSpace\Belajar\PHP\MVC\Service\AuthorService;

class AuthorController
{
    private AuthorService $service;

    public function __construct()
    {
        $container = new Container();
        $this->service = $container->get(AuthorService::class);
    }
    public function author()
    {
        $model = [
            "title" => "Bookstore",
        ];

        try {
            $data = $this->service->showAll();
            $model['data'] = $data;

            View::render('Authors/authors', $model);
        } catch (ValidationException $e) {
            $model['error'] = $e->getMessage();
            View::render('Authors/authors', $model);
        }
    }

    public function postAuthor()
    {
        $model = [
            "title" => "Bookstore",
        ];
        try {
            $request = new AuthorRequest(
                name: $_POST['name'],
                email: $_POST['email'],
                birthdate: $_POST['birthdate'],
                placeOfBirth: $_POST['placeOfBirth']
            );

            $this->service->add($request);
            View::redirect('/authors');
        } catch (ValidationException $e) {
            $model['error'] = $e->getMessage();
            View::render('Authors/authors',  $model);
        }
    }

    public function removeAuthor(string $id)
    {
        $model = [
            "title" => "Bookstore",
        ];

        try {
            $search = $_GET['search'] ?? '';
            $this->service->removeById($id);
            $books = $this->service->showAll();
            $model['authors'] = $books;
            View::redirect('/authors', $model);
        } catch (ValidationException $e) {
            $model['error'] = $e;
            View::redirect('/authors', $model);
        }
    }

    public function getById(int $id)
    {
        try {
            $author = $this->service->getById($id);
            header('Content-Type: application/json');
            echo json_encode(['data' => $author]);
        } catch (ValidationException $e) {
            JsonResource::json(['errors' => [
                'message' => $e->getMessage()
            ]], 404);
        }
    }

    public function updateById(int $id)
    {
        $model = [
            "title" => "Bookstore",
        ];
        try {
            $request = new AuthorRequest(
                name: $_POST['name'],
                email: $_POST['email'],
                birthdate: $_POST['birthdate'],
                placeOfBirth: $_POST['placeOfBirth']
            );

            $this->service->updateById($id, $request);
            View::redirect('/authors');
        } catch (ValidationException $e) {
            $model['error'] = $e->getMessage();
            View::render('Authors/authors',  $model);
        }
    }
}
