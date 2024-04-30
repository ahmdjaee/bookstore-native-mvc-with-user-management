<?php

namespace RootNameSpace\Belajar\PHP\MVC\Controller;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Model\BooksListRequest;

class BookControllerTest extends TestCase
{

    private BooksController $controller;

    protected function setUp(): void
    {
        $this->controller = new BooksController();
    }
    // public function testUpdateSuccess()
    // {      
    //      $_POST['name'] = 'update';
    //      $_POST['genre'] = 'update';
    //      $_POST['releaseDate'] = 'update';
    //      $_POST['authorId'] = '41';
    //      $_POST['synopsis'] = 'update';
    //      $_POST['pages'] = '200';

    //     $this->controller->updateBook(288);

    //     $this->assertEquals('update', $_POST['name']);
    // }
}