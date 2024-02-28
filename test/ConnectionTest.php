<?php

use RootNameSpace\Belajar\PHP\MVC\Config\Database;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    Database::getConnection();
    echo "Connection Success";
} catch (PDOException $e) {
    echo $e->getMessage();
}
