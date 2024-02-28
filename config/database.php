<?php

function getDatabaseConfig(): array
{

    return  [
        "database" => [
            "test" => [
                "url" => "mysql:host=localhost;dbname=bookstore-mvc-test",
                "username" => "root",
                "password" => ""
            ],
            "development" => [
                "url" => "mysql:host=localhost;dbname=bookstore-mvc",
                "username" => "root",
                "password" => ""
            ],
        ]
    ];
}
