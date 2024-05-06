<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class GenreRequest
{
    public function __construct(
        public ?string $name = null
    ) {
    }
}
