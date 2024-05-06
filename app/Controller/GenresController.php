<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\GenreRequest;
use RootNameSpace\Belajar\PHP\MVC\Service\GenreService;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class GenresController
{
    public function __construct(protected GenreService $service, protected SessionService $sessionService)
    {
        
    }
    public function main()
    {
        $model = [];
        $keyword = $_GET['search'] ?? '';

        $session = $this->sessionService->current();

        if ($session == null) {
            View::redirect("/users/login");
        } else {
            try {
                $genres = $this->service->search($keyword);
                $model['publishers'] = $genres;
            } catch (ValidationException $e) {
                $model['notFound'] = $e->getMessage();
            }
        }

        View::render('Genres/genres', $model);
    }

    public function add()
    {
        $model = [
            "title" => "Bookstore",
        ];

        $request = new GenreRequest(
            name: $_POST['name'],
        );

        $session = $this->sessionService->current();

        if ($session == null) {
            View::redirect("/users/login");
        } else {
            try {
                $this->service->add($request);
                View::redirect('/genres');
            } catch (ValidationException $e) {
                $model['errors'] = $e->getMessage();
                View::render('Genres/genres', $model);
            }
        }
    }
}
