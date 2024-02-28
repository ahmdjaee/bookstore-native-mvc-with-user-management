<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Users
{
    public function __construct(
        public string $username,
        public string $name,
        public string $password,
        public string $createdAt,
    ) {
    }
}
