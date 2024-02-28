<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class UsersLoginRequest{

    public function __construct(
        public ?string $username = null,
        public ?string $password = null,
    ) {
    }
}