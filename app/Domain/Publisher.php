<?php

namespace RootNameSpace\Belajar\PHP\MVC\Domain;

class Publisher
{
    public function __construct(
        public ?int $id = null,
        public ?string $name = null,
        public ?string $address = null
    ) {
    }
}
