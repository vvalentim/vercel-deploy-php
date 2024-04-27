<?php

namespace Controllers;

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
}
