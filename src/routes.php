<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get("/", fn () => "Home.");

Router::get("/greet/{name?}", function (?string $name = null) {
    if (!empty($name)) {
        return "Hello {$name}!";
    }

    return "Hello world!";
})->where(["name" => "[a-zA-Z]+"]);

Router::group(["namespace" => "\\Handlers"], function () {
    Router::get("/not-found", "Generic@notFound");
    Router::get("/forbidden", "Generic@forbidden");
});


Router::error(function (Request $request, Exception $exception) {
    switch ($exception->getCode()) {
            // Page not found
        case 404:
            response()->redirect('/not-found');
            // Forbidden
        case 403:
            response()->redirect('/forbidden');
    }
});
