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
        $this->repository = new BookRepository(Database::getConnection());
        // $this->repository->removeAll();
    }

    public function testSaveSuccess()
    {

        $book = new Books(
            name: "Attack on titan",
            genre: "Action",
            releaseDate: "2122-01-01",
            authorId: 17,
            synopsis: 'Laskar Pelangi bercerita tentang kehidupan 10 anak lelaki di Belitong, Indonesia, yang mendirikan sekolah Muhammadiyah karena keterbatasan ekonomi.  Mereka berjuang keras untuk tetap bisa belajar dengan menghadapi berbagai rintangan,  mulai dari ketidakcukupan biaya hingga cemoohan dari orang sekitar.  Dengan kegigihan mereka dan bimbingan seorang guru yang inspiratif,  mereka membuktikan bahwa keterbatasan bukanlah halangan untuk meraih cita-cita.',
            pages: 100
        );

        $result = $this->repository->save($book);

        $this->assertEquals($book->id, $result->id);
    }

    // public function testGetAllSuccess()
    // {

    //     $book = new Books(
    //         name: "test",
    //         genre: "test",
    //         releaseDate: "test",
    //         authorId: 1234567890,
    //         synopsis: 'test',
    //         pages: 100
    //     );

    //     $this->repository->save($book);

    //     $result = $this->repository->getAll();

    //     $this->assertCount(1, $result);
    // }

    public function testSearchSuccess()
    {
        $result =  $this->repository->search(keyword: '', page: 2, limit: 2);

        $logger = new Logger(BookRepositoryTest::class);

        $handler = new StreamHandler(__DIR__ . '/../../application.log');

        $handler->setFormatter(new JsonFormatter());

        $logger->pushHandler($handler);
        $logger->info('Test Result', $result);
    }
}
