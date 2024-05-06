<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use RootNameSpace\Belajar\PHP\MVC\App\View;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\PublisherRequest;
use RootNameSpace\Belajar\PHP\MVC\Service\PublisherService;
use RootNameSpace\Belajar\PHP\MVC\Service\SessionService;

class PublisherController
{
    public function __construct(protected PublisherService $service, protected SessionService $sessionService)
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
                $publishers = $this->service->search($keyword);
                $model['publishers'] = $publishers;
            } catch (ValidationException $e) {
                $model['notFound'] = $e->getMessage();
            }
        }

        View::render('Publishers/publishers', $model);
    }

    public function add()
    {
        $request = new PublisherRequest(
            name: $_POST['name'],
            address: $_POST['address'],
        );

        $session = $this->sessionService->current();

        if ($session == null) {
            View::redirect("/users/login");
        } else {
            try {
                $this->service->add($request);
                View::redirect('/publishers');
            } catch (ValidationException $e) {
                View::redirect('/publishers');
            }
        }
    }

    public function update()
    {
    }

    public function delete()
    {
    }

    public function detail()
    {
    }
}
