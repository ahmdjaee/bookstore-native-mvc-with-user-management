<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class AuthorRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $email = null,
        public ?string $birthdate = null,
        public ?string $placeOfBirth = null
    ){
        
    }
}