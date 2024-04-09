<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Author
{
    public function __construct(
        public ?string $id = null,
        public string $name = "",
        public string $email = "",
        public string $birthdate = "",
        public string $placeOfBirth = "",
    ) {
    }
}
