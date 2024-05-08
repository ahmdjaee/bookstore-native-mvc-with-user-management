<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class PublisherRequest
{
    public function __construct(
        public ?string $name = null,
        public ?string $address = null,
    ) {
    }
}
