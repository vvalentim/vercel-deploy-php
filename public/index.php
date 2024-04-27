<?php

session_start();
error_reporting(E_ALL);
ini_set("display_errors", true);

require_once(__DIR__ . "/../vendor/autoload.php");
require_once(__DIR__ . "/../src/helpers.php");
require_once(__DIR__ . "/../src/routes.php");

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::start();
