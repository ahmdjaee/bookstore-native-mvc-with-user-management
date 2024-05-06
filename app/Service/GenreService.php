<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use RootNameSpace\Belajar\PHP\MVC\Domain\Genre;
use RootNameSpace\Belajar\PHP\MVC\Model\GenreResponse;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\GenreRequest;
use RootNameSpace\Belajar\PHP\MVC\Repository\GenreRepository;

class GenreService
{
    public function __construct(protected GenreRepository $repository)
    {
    }

    public function add(GenreRequest $request): GenreResponse
    {
        $this->validationRequest($request);

        try {
            $genre = new Genre(
                name: $request->name
            );

            $response = $this->repository->save($genre);

            return new GenreResponse($response);
        } catch (ValidationException $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    public function update($request)
    {
    }

    public function deleteAll()
    {
        $this->repository->deleteAll();
    }

    public function deleteById(int $id)
    {
        $this->repository->deleteById($id);
    }
    public function detail()
    {
    }

    public function search(string $keyword = ""): array
    {
        $result = $this->repository->search($keyword);

        if (empty($result)) {
            throw new ValidationException("publisher not found");
        } else {
            return $result;
        }
    }

    private function validationRequest(GenreRequest $request)
    {
        if ($request->name == null) {
            throw new ValidationException("name is required");
        }
    }
}
