<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Books
{
    function __construct(
        public ?string $bookId = null,
        public string $name = "",
        public string $genre = "",
        public string $releaseDate = "",
        public string $author = "",
    ) {
    }
}
