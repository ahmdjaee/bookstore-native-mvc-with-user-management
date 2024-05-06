<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use RootNameSpace\Belajar\PHP\MVC\Domain\Books;
use RootNameSpace\Belajar\PHP\MVC\Repository\BookRepository;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListResponse;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;

class BookService
{

    private BookRepository $repository;

    public function __construct(BookRepository $repository)
    {
        $this->repository = $repository;
    }
    public function add(BooksListRequest $request): BooksListResponse
    {
        $this->validateBooksListRequest($request);

        try {
            $books = new Books(
                name: $request->name,
                image: $request->image,
                genreId: $request->genreId,
                releaseDate: $request->releaseDate,
                authorId: $request->authorId,
                synopsis: $request->synopsis,
                pages: $request->pages,
                publisherId: $request->publisherId,
                price: $request->price,
                stock: $request->stock
            );

            $this->repository->save($books);
            $response = new BooksListResponse();
            $response->books = $books;

            return $response;
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }

    private function validateBooksListRequest(BooksListRequest $request)
    {
        switch ($request) {
            case $request->name == trim(""):
            case $request->genreId == trim(""):
            case $request->releaseDate == trim(""):
            case $request->authorId == trim(""):
            case $request->pages == trim(""):
            case $request->name == null:
            case $request->genreId == null:
            case $request->releaseDate == null:
            case $request->authorId == null:
            case $request->pages == null:
                throw new ValidationException("There must be no empty fields");
        }
    }

    public function search(string $keyword = ""): ?array
    {
        $result = $this->repository->search($keyword);

        if ($result) {
            return $result;
        } else {
            return null;
        }
    }

    public function removeById(string $id)
    {
        $find = $this->repository->findById($id);

        if ($find) {
            $this->repository->remove($id);
        }{
            throw new ValidationException('Id Not Found');
        }
    }

    public function getById(string $id)
    {
        $find = $this->repository->findById($id);

        if ($find) {
            return $find;
        } else {
            throw new ValidationException('Id Not Found');
        }
    }

    public function updateById(string $id, BooksListRequest $request): BooksListResponse
    {
        $this->validateBooksListRequest($request);
        $find = $this->repository->findById($id);

        if (!$find) {
            throw new ValidationException('Id Not Found');
        }

        try {
            $books = new Books(
                id: $id,
                name: $request->name,
                image: $request->image,
                genreId: $request->genreId,
                releaseDate: $request->releaseDate,
                authorId: $request->authorId,
                synopsis: $request->synopsis,
                pages: $request->pages,
                publisherId: $request->publisherId,
                price: $request->price,
                stock: $request->stock
            );

            $this->repository->update($books);

            $response = new BooksListResponse();
            $response->books = $books;

            return $response;
        } catch (\Exception $e) {
            throw new ValidationException($e->getMessage());
        }
    }
}
