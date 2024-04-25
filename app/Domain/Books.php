<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Books
{
    function __construct(
        public ?string $id = null,
        public string $name = "",
        public string $genre = "",
        public string $releaseDate = "",
        public string $authorId = "",
        public string $synopsis = "",
        public int $pages = 0
    ) {
    }
}
