<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\AuthorRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\AuthorRepository;
use RootNameSpace\Belajar\PHP\MVC\Service\AuthorService;

class AuthorController
{
    private AuthorRepository $repository;
    private AuthorService $service;

    public function __construct()
    {

        $this->repository = new AuthorRepository(Database::getConnection());
        $this->service = new AuthorService($this->repository);
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
}
