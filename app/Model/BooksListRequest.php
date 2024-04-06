<?php

namespace RootNameSpace\Belajar\PHP\MVC\Model;

class BooksListRequest
{
    public ?string $name = null;
    public ?string $genre = null;
    public ?string $releaseDate = null;
    public ?string $authorId = null;
    public ?int $pages = null;
}
