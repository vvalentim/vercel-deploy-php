<?php

use Pecee\Http\Request;
use Pecee\SimpleRouter\SimpleRouter as Router;

Router::group(["namespace" => "\\Controllers"], function () {
    Router::get("/", "Home@index");
    Router::get("/session-test", "Home@sessionTest");
    Router::get("/greet/{name?}", "Home@greet")->where(["name" => "[a-zA-Z]+"]);
});

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
