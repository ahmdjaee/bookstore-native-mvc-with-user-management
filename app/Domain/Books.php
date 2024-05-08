<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Books
{
    function __construct(
        public ?string $id = null,
        public string $name = "",
        public string $image = "",
        public string $genreId = "",
        public string $genre = "",
        public string $releaseDate = "",
        public string $authorId = "",
        public string $author = "",
        public string $synopsis = "",
        public int $pages = 0,
        public string $publisherId = "",
        public string $publisher = "",
        public int $price = 0,
        public int $stock = 0
    ) {
    }
}
