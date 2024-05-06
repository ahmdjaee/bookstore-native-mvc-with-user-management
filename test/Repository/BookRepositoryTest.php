<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use Monolog\Formatter\JsonFormatter;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Books;


class BookRepositoryTest extends TestCase
{
    private BookRepository $repository;
    protected function setUp(): void
    {
        $database = new Database();
        $this->repository = new BookRepository($database);
        // $this->repository->removeAll();
    }

    public function testSaveSuccess()
    {

        $book = new Books(
            name: "Attack on titan",
            genreId: "Action",
            releaseDate: "2122-01-01",
            authorId: 40,
            synopsis: 'Laskar Pelangi bercerita tentang kehidupan 10 anak lelaki di Belitong, Indonesia, yang mendirikan sekolah Muhammadiyah karena keterbatasan ekonomi.  Mereka berjuang keras untuk tetap bisa belajar dengan menghadapi berbagai rintangan,  mulai dari ketidakcukupan biaya hingga cemoohan dari orang sekitar.  Dengan kegigihan mereka dan bimbingan seorang guru yang inspiratif,  mereka membuktikan bahwa keterbatasan bukanlah halangan untuk meraih cita-cita.',
            pages: 100
        );

        $result = $this->repository->save($book);

        $this->assertEquals($book->id, $result->id);
    }
}
