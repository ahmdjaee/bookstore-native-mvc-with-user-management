<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use RootNameSpace\Belajar\PHP\MVC\Domain\Publisher;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;
use RootNameSpace\Belajar\PHP\MVC\Model\PublisherRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\PublisherResponse;
use RootNameSpace\Belajar\PHP\MVC\Repository\PublisherRepository;

class PublisherService
{
    public function __construct(protected PublisherRepository $repository)
    {
    }
    public function add(PublisherRequest $request): PublisherResponse
    {
        $this->validationRequest($request);

        try {
            $publisher = new Publisher(
                name: $request->name,
                address: $request->address
            );

            $response = $this->repository->save($publisher);

            return new PublisherResponse($response);
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

    public function findAll(): array
    {
        $result = $this->repository->findAll();

        if (empty($result)) {
            throw new ValidationException("publisher not found");
        } else {
            return $result;
        }
    }

    private function validationRequest(PublisherRequest $request)
    {
        if ($request->name == null) {
            throw new ValidationException("name is required");
        }
        if ($request->address == null) {
            throw new ValidationException("address is required");
        }
    }
}
