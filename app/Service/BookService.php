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
    public function addBook(BooksListRequest $request): BooksListResponse
    {
        $this->validateBooksListRequest($request);

        try {
            $books = new Books();

            $books->name = $request->name;
            $books->genre = $request->genre;
            $books->releaseDate = $request->releaseDate;
            $books->authorId = $request->authorId;
            $books->pages = $request->pages;

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
            case $request->genre == trim(""):
            case $request->releaseDate == trim(""):
            case $request->authorId == trim(""):
            case $request->pages == trim(""):
            case $request->name == null:
            case $request->genre == null:
            case $request->releaseDate == null:
            case $request->authorId == null:
            case $request->pages == null:
                throw new ValidationException("There must be no empty fields");
        }
    }
    public function getAllBooks(): array
    {
        return $this->repository->getAll();
    }

    public function search(string $keyword): ?array
    {
        $result = $this->repository->search($keyword);

        if ($result) {
            return $result;
        } else {
            return null;
            // throw new ValidationException('No records Found');
        }
    }

    public function removoById(string $id)
    {
        $find = $this->repository->findById($id);

        if ($find) {
            $this->repository->remove($id);
        } else {
            throw new ValidationException('Id Not Found');
        }
    }
}
