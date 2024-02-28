<?php

namespace RootNameSpace\Belajar\PHP\MVC\Repository;

use RootNameSpace\Belajar\PHP\MVC\Domain\Session;

class SessionRepository
{

    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }

    public function save(Session $session): Session
    {
        $statement = $this->connection->prepare("INSERT INTO sessions (id, username) VALUES (:id, :username)");

        $statement->execute([
            'id' => $session->id,
            'username' => $session->username
        ]);

        return $session;
    }

    public function findById(string $id): ?Session
    {
        $sql = "SELECT id, username FROM sessions WHERE id = ?";

        $statement = $this->connection->prepare($sql);

        $statement->execute([$id]);

        try {
            if ($row = $statement->fetch()) {
                $session = new Session();
                $session->id = $row['id'];
                $session->username = $row['username'];

                return $session;
            } else {
                return null;
            }
        } finally {
            $statement->closeCursor();
        }
    }

    public function removeAll(): void
    {
        $this->connection->exec("DELETE FROM sessions");
    }
}
