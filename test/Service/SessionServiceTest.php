<?php

namespace RootNameSpace\Belajar\PHP\MVC\Service;

use PHPUnit\Framework\TestCase;
use RootNameSpace\Belajar\PHP\MVC\Repository\SessionRepository;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;

class SessionServiceTest extends TestCase
{
    private SessionService $sessionService;
    
    protected function setUp(): void{
        $this->sessionService = new SessionService(new SessionRepository(Database::getConnection()));
        // $this->sessionService->removeAll();
    }

    public function testCreate(){}


    public function testDestroy(){
        
    }

    public function testCurrent(){
        $this->sessionService->current();
        $this->assertNotNull($this->sessionService->current());

    }
}