<?php

namespace RootNameSpace\Belajar\PHP\MVC\Resource;

use Laminas\HttpHandlerRunner\Emitter\SapiEmitter;
use Nyholm\Psr7\Factory\Psr17Factory;
use Nyholm\Psr7\Response;

class JsonResource
{
    public static function json(array $data, $statusCode)
    {
        $factory = new Psr17Factory();

        $responseBody = $factory->createStream(json_encode($data));
        $response = new Response($statusCode, ['Content-Type' => 'application/json; charset=UTF-8'], $responseBody);
        (new SapiEmitter())->emit($response);
    }
}
