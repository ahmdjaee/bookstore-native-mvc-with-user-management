<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

use RootNameSpace\Belajar\PHP\MVC\Domain\Genre;

class GenreResponse
{
    public function __construct(
        public ?Genre $genre = null
    ) {
    }
}
