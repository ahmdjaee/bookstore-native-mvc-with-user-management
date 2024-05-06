<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

require_once __DIR__ . '/../../vendor/autoload.php';

use PDO;
use RootNameSpace\Belajar\PHP\MVC\Config\Database;
use RootNameSpace\Belajar\PHP\MVC\Domain\Users;
use RootNameSpace\Belajar\PHP\MVC\Exception\ValidationException;

class UserRepository
{
    private PDO $connection;

    public function __construct(Database $database)
    {
        $this->connection = $database->getConnection();
    }
    public function save(Users $users): Users
    {

        $sql = "INSERT INTO users (username, name, password , createdAt) VALUES (:username, :name, :password, :createdAt)";
        $this->connection->prepare($sql)->execute([
            'username' => $users->username,
            'name' => $users->name,
            'password' => $users->password,
            'createdAt' => $users->createdAt
        ]);

        return $users;
    }

    public function findUsername(string $username): ?Users
    {
        $sql = "SELECT * FROM users WHERE username = :username";

        $statement = $this->connection->prepare($sql);

        $statement->execute(['username' => $username]);

        $row = $statement->fetch();

        try {
            if ($row) {
                return new Users(
                    username: $row['username'],
                    name: $row['name'],
                    password: $row['password'],
                    createdAt: $row['createdAt']
                );
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function removeAll(): void
    {
        $this->connection->exec("DELETE FROM users");
    }
}
