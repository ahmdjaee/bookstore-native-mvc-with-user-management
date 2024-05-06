<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class BooksListRequest
{
    public function __construct(
        public ?string $id = null,
        public ?string $name = null,
        public ?string $image = null,
        public ?string $genreId = null,
        public ?string $releaseDate = null,
        public ?string $authorId = null,
        public ?string $synopsis = null,
        public ?string $pages = null,
        public ?string $publisherId = null,
        public ?string $price = null,
        public ?string $stock = null,
    ) {
    }
}
