<?php


namespace RootNameSpace\Belajar\PHP\MVC\Model;

use RootNameSpace\Belajar\PHP\MVC\Domain\Publisher;

class PublisherResponse
{
    public function __construct(
        public ?Publisher $publisher = null
    ) {
    }
}
