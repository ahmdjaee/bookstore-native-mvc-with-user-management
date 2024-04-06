<?php

use RootNameSpace\Belajar\PHP\MVC\Config\Database;

require_once __DIR__ . '/../vendor/autoload.php';

try {
    Database::getConnection();
    echo "Connection Success";
} catch (PDOException $e) {
    echo $e->getMessage();
}

$conn = Database::getConnection();

// Deklarasi variabel
$page = 1;
$limit = 6;
$perPage = $limit / $page;
$offset = ($page - 1) * $limit;

// Query data
$sql = "SELECT * FROM `books` LIMIT $offset, $perPage";
$result = $conn->query($sql);

if (!$result) {
    die("Error: Query data gagal: ");
}

// Simulasi data
$data = array();
while ($row = $result->fetchAll(PDO::FETCH_ASSOC)) {
    $data[] = $row;
}

// Tampilkan hasil
echo "Data per halaman: " . PHP_EOL;
print_r($data);
