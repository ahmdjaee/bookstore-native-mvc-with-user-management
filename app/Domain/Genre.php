<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Genre
{
    function __construct(
        public ?string $id = null,
        public string $name = ""
    ) {
    }
}