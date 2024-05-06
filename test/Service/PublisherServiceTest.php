<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use DI\Container;
use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Model\PublisherRequest;

class PublisherServiceTest extends TestCase
{

    private PublisherService $service;
    protected function setUp(): void
    {
        $container = new Container();
        $this->service = $container->get(PublisherService::class);
        $this->service->deleteAll();
    }

    public function testAddSuccess()
    {

        $request = new PublisherRequest(
            name: "test",
            address: "test"
        );

        $response = $this->service->add($request);

        self::assertEquals($request->name, $response->publisher->name);
        self::assertEquals($request->address, $response->publisher->address);
    }

    public function testSearchSuccess()
    {
        $this->testAddSuccess();

        $result = $this->service->search("test");
        self::assertCount(1, $result);
    }

    // public function testSearchFailed()
    // {
    // }
}
