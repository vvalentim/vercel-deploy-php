<?php

namespace Controllers;

use PDO;
use PDOStatement;

class Home
{
    public function index()
    {
        return "Home.";
    }

    public function greet(?string $name = null)
    {
        if (!empty($name)) {
            return "Hello {$name}!";
        }

        return "Hello world!";
    }

    public function sessionTest()
    {
        if (empty($_SESSION["session-test"])) {
            $_SESSION["session-test"] = random_int(1, 1000);
        }

        dump($_COOKIE["PHPSESSID"] ?? "");

        return "Session value: {$_SESSION["session-test"]}";
    }

    public function configDbTest()
    {
        $db = new PDO($_ENV["DB_DSN"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"], [PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
        $stmt = $db->query("SELECT * FROM users");

        if ($stmt instanceof PDOStatement) {
            $stmt->execute([]);
            dump($stmt->fetchAll());
        }
    }
}
